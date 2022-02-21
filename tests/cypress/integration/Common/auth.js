/// <reference types="cypress" />

context('Actions', () => {
    before(() => {
        cy.refreshDatabase()
            .seed('DatabaseSeeder');
    });

    it('go to home page', () => {
        cy.visit({ route: 'index' });
    });

    // Validation Flow
    it('login validation check', () => {
        cy.visit({ route: 'index' })
            .get('.justify-end > .text-gray-500')
            .contains('Sign in')
            .click()

        // Genreate All Error
        cy.get('.flex > .inline-flex').click();
        cy.get('.text-red-500').contains('The role field is required.')
            .get('.text-red-600').contains('The email field is required.')
            .get(':nth-child(4) > .text-red-600').contains('The password field is required.');

        cy.get('#roles').select('admin')
            .get('#email').type('drgavali9@gmail.com')
            .get('#password').type('Admin@123')
            .get('#remember_me').check()
            .get('.flex > .inline-flex').click();

        cy.get('.text-red-600').contains('These credentials do not match our records.');
        cy.get('#password').type('password');
    });

    it('forgot password validate page', () => {
        cy.visit({ route: 'index' });
        cy.get('.justify-end > .text-gray-500').contains('Sign in').click()
        cy.get('.underline').contains('Forgot your password?').click()

        // Genreate All Error
        cy.get('.inline-flex').click()
            .get('.text-red-600').contains('The email field is required.')
            .get('#email').type('drgavali9@gmail.com')
            .get('.inline-flex').click()
            .get('.text-red-600').contains("We can't find a user with that email address.");

    });

    it('signup validation check', () => {
        cy.visit({ route: 'index' });
        cy.get('.ml-8').contains('Sign up').click()

        // Genreate All Error
        cy.get('.inline-flex').click()
            .get(':nth-child(2) > .mt-4 > .text-red-500').contains('The school id field is required.')
            .get(':nth-child(3) > .mt-4 > .text-red-500').contains('The role field is required.')
            .get(':nth-child(4) > .text-red-600').contains('The first name field is required.')
            .get(':nth-child(5) > .text-red-600').contains('The last name field is required.')
            .get(':nth-child(6) > .text-red-600').contains('The email field is required.')
            .get(':nth-child(7) > .text-red-600').contains('The mobile field is required.')
            .get(':nth-child(8) > .text-red-600').contains('The date of birth field is required.')
            .get(':nth-child(9) > .mt-4 > .text-red-500').contains('The gender field is required.')
            .get(':nth-child(10) > .text-red-600').contains('The password field is required.');
    });

    it('already registered flow check', () => {
        cy.visit({ route: 'index' })
            .get('.ml-8').contains('Sign up').click()
            .get('.underline').contains('Already registered?').click()
            .intercept('/login');
    });

    it('admin register', () => {
        cy.visit({ route: 'index' });
        cy.get('.ml-8').contains('Sign up').click()

        cy.get('#school').select('1')
            .get('#roles').select('admin')
            .get('#first_name').type('Dipak')
            .get('#last_name').type('Gavali')
            .get('#email').type('drgavali9@gmail.com')
            .get('#mobile').type('+91 9173921432')
            .get('#date_of_birth').type('1995-09-10')
            .get('#gender').select('Male')
            .get('#password').type('password')
            .get('#password_confirmation').type('password')
            .get('.inline-flex').click();

        cy.intercept('/dashboard')
            .get('form > .text-white').click()
            .intercept('/');
    });

    it('admin user can login', () => {
        cy.visit({ route: 'index' });
        cy.get('.justify-end > .text-gray-500').contains('Sign in').click()

        cy.get('#roles').select('admin')
            .get('#email').type('drgavali9@gmail.com')
            .get('#password').type('password')
            .get('#remember_me').check()
            .get('.flex > .inline-flex').click();

        cy.intercept('/dashboard')
            .get('form > .text-white').click()
            .intercept('/');
    });
})
