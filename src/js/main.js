class main {
  constructor() {
    if (document.querySelector('.block-funding-form form')) {
      this.init();
    }
  }

  init() {
    console.log('Hello from main.js!');
  }
}

export { main };