let angle = 0;

function setup() {
    createCanvas(219, 452);
    // 画布サイズを設定
}

function draw() {
    background(220); // 背景色を設定

    // 円を描画
    translate(width / 2, height / 2); // 原点を中心に設定
    rotate(radians(angle)); // 角度を変更
    fill(0, 0, 255); // 塗りつぶし色を設定 (青)
    noStroke(); // 枠線なし
    ellipse(0, 0, 100, 100); // 円を描画

    angle += 1; // 角度を増加
}