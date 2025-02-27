describe('Add User', () => {
    it('should perform the same actions as the Selenium script', () => {
      cy.visit('http://localhost:8888/test_g2/src/');
      cy.get('input[id="name"]').type('test');
      cy.get('input[id="email"]').type('test@test.com');
      cy.get('button:nth-child(4)').click();
      cy.get('li').should('be.visible');
      cy.get('span:nth-child(1)').should('contain.text', 'test (test@test.com)');
    });
  });
  