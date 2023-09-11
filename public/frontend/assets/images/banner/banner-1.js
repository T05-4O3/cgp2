let waves = [];
let numWaves = 5;

function setup() {
    createCanvas(windowWidth, windowHeight);
    for (let i = 0; i < numWaves; i++) {
        waves.push(new Wave());
    }
}

function draw() {
  background(0); // 背景色を設定

    for (let i = 0; i < waves.length; i++) {
        waves[i].update();
        waves[i].display();
    }
}

class Wave {
    constructor() {
        this.y = random(height); // 波の縦位置
        this.angle = 0;
        this.amplitude = random(20, 100); // 波の振幅
        this.frequency = random(0.02, 0.1); // 波の周波数
    }

    update() {
        this.angle += this.frequency;
    }

    display() {
        noFill();
        stroke(255); // 線の色
        strokeWeight(2);
        beginShape();
        for (let x = 0; x < width; x += 10) {
        let y = this.y + sin(this.angle + x * 0.01) * this.amplitude;
        vertex(x, y);
        }
        endShape();
    }
}

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}