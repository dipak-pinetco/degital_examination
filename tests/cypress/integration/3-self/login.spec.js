/// <reference types="cypress" />

context('Actions', () => {
  beforeEach(() => {
    cy.refreshDatabase();
  })

    it('authenticated users can see the dashboard', () => {
        cy.visit('/login');
        // cy.get('#roles').type('admin');
        cy.get('#email').type('drgavali9@gmail.com');
        cy.get('#password').type('Admin@123');
    });
})
