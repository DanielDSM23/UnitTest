describe('User Management', () => {
    beforeEach(() => {
      cy.visit('http://localhost:8888/test_g2/src/');
    });
  
    it('Ajout d\'un nouvel utilisateur', () => {
      cy.get('input[id="name"]').type('test');
      cy.get('input[id="email"]').type('test@test.com');
      cy.get('button:nth-child(4)').click();
      cy.get('li').should('be.visible');
      cy.get('span:nth-child(1)').should('contain.text', 'test (test@test.com)');
    });
  
    it('Modification d\'un utilisateur', () => {
      cy.get('button:nth-child(2)').click();
      cy.get('input[id="name"]').clear().type('test1');
      cy.get('input[id="email"]').clear().type('test1@test.com');
      cy.get('button:nth-child(4)').click();
      cy.get('span:nth-child(1)').should('contain.text', 'test1 (test1@test.com)');
    });
  
    it('Supression d\'un utilisateur', () => {
      cy.get('button:nth-child(3)').click();
      cy.get('li:nth-child(1)').should('not.exist');
    });
  });
  