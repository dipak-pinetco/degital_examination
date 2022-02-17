<?php

namespace App\Http\Livewire\Examinations;

use App\Models\Clases;
use App\Models\ClassDivision;
use App\Models\Examination;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Livewire\Component;
use Livewire\WithPagination;

class ListExamination extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $examinations = Examination::with([
            'academicYear',
            'examinationGroup',
            'supervisionTeacher',
            'examinationable' => function (MorphTo $morphTo) {
                $morphTo->morphWith([
                    Clases::class => [],
                    ClassDivision::class => ['clases'],
                ]);
            }
        ])
            ->whereHasMorph(
                'examinationable',
                [Clases::class, ClassDivision::class],
                function (Builder $query, $type) {
                    if ($type === Clases::class) {
                        $query->whereHas('school', function ($querySchool) {
                            $querySchool->where('id', auth()->user()->school_id);
                        });
                    } elseif ($type === ClassDivision::class) {
                        $query->whereHas('class', function ($queryClass) {
                            $queryClass->whereHas('school', function ($querySchool) {
                                $querySchool->where('id', auth()->user()->school_id);
                            });
                        });
                    }
                }
            )
            ->when(!empty($this->search), function ($query) {
                $query->whereLike([
                    'name',
                    'academicYear.academic_year',
                    'examinationGroup.name',
                    'supervisionTeacher.first_name',
                    'supervisionTeacher.last_name',
                    'examinationable.name'
                ], $this->search);
            })
            ->orderBy('id', 'DESC')->paginate(Examination::PAGINATION_COUNT)
            ->withPath('/examination')->withQueryString();
        return view('livewire.examinations.list-examination', ['examinations' => $examinations]);
    }

    public function examinationDelete(Examination $examination)
    {
        $examination->delete();
        session()->flash('message', __('Examination successfully deleted.'));
        session()->flash('class', 'green');
    }
}
