const canvas = document.getElementById("cursorCanvas");
const ctx = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let particles = [];

class Particle {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.size = 8;
    this.color = `hsl(${Math.random() * 360}, 100%, 50%)`;
    this.speedX = (Math.random() - 0.5) * 4;
    this.speedY = (Math.random() - 0.5) * 4;
  }
  update() {
    this.x += this.speedX;
    this.y += this.speedY;
    this.size *= 0.95;
  }
  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    ctx.fillStyle = this.color;
    ctx.fill();
  }
}

function handleParticles() {
  for (let i = 0; i < particles.length; i++) {
    particles[i].update();
    particles[i].draw();
    if (particles[i].size < 0.5) {
      particles.splice(i, 1);
      i--;
    }
  }
}

function animate() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  handleParticles();
  requestAnimationFrame(animate);
}

animate();

window.addEventListener("mousemove", function (e) {
  for (let i = 0; i < 5; i++) {
    particles.push(new Particle(e.x, e.y));
  }
});

window.addEventListener("resize", function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});
// Card navigation logic
const cards = document.querySelectorAll(".card");
let current = 0;

function showCard(index) {
  cards.forEach((card, i) => {
    card.classList.remove("active");
    if (i === index) {
      card.classList.add("active");
    }
  });
}

document.getElementById("next").addEventListener("click", () => {
  current = (current + 1) % cards.length;
  showCard(current);
});

document.getElementById("prev").addEventListener("click", () => {
  current = (current - 1 + cards.length) % cards.length;
  showCard(current);
});
showCard(current);

