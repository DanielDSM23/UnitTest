describe('Delete user', () => {
    it('should perform the same actions as the Selenium script', () => {
      cy.visit('http://localhost:8888/test_g2/src/');
      cy.get('button:nth-child(3)').click();
      cy.get('li:nth-child(1)').should('not.exist');
    });
  });
  