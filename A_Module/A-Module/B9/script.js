const stars = new (class {
  constructor() {
    this.render();
  }
  async render(data) {
    this.db =
      data ||
      JSON.parse(localStorage.star || 0) ||
      (await await fetch("./data.json"));
    localStorage.star = JSON.stringify(this.db);
    $(".container").innerHTML = this.db
      .map(
        (e, i) =>
          `<div onclick='stars.toggle(${i})'>
          <h2>${e.name}</h2>
          <p>${e.desc}</p>
          <h2>${e.isStar ? "★" : "☆"}</h2>
        </div>`,
      )
      .join("");
  }
  toggle(i) {
    this.db[i].isStar = !this.db[i].isStar;
    this.render(this.db);
  }
})();
