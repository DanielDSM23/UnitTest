describe('Edit User', () => {
    it('should perform the same actions as the Selenium script', () => {
      cy.visit('http://localhost:8888/test_g2/src/');
      cy.get('button:nth-child(2)').click();
      cy.get('input[id="name"]').clear();
      cy.get('input[id="name"]').type('test1');
      cy.get('input[id="email"]').clear();
      cy.get('input[id="email"]').type('test1@test.com');
      cy.get('button:nth-child(4)').click();
      cy.get('span:nth-child(1)').should('contain.text', 'test1 (test1@test.com)');
    });
  });
  