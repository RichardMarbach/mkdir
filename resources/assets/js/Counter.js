class Counter {
  
  constructor() {
    this.count = 0;
    setTimeout(() => this.tick(), 1000);
  }

  tick() {
    ++this.count;
    console.log(this.count);
  }
}

export default Counter;