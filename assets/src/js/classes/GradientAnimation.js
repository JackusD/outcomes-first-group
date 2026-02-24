const BG_COLOUR = {r: 63, g: 169, b: 155};

const COLOURS = [
    {r: 63, g: 169, b: 155},
    {r: 63, g: 90, b: 174},
    {r: 251, g: 99, b: 98},
];

const PI2 = Math.PI * 2;

class GlowParticle {
    constructor(x, y, radius, rgb) {
        this.x = x;
        this.y = y;
        this.radius = radius;
        this.rgb = rgb;

        this.vx = Math.random() * 4;
        this.vy = Math.random() * 4;

        this.sinValue = Math.random();
    }

    animate(ctx, stageWidth, stageHeight) {
        this.sinValue += 0.01;

        this.radius += Math.sin(this.sinValue);

        this.x += this.vx;
        this.y += this.vy;

        if (this.x < - stageHeight) {
            this.vx *= -1;
            this.x += 10;
        } else if (this.x > stageWidth * 2)  {
            this.vx *= -1;
            this.x -= 10;
        }

        if (this.y < - stageHeight) {
            this.vy *= -1;
            this.y += 10;
        } else if (this.y > stageHeight * 2)  {
            this.vy *= -1;
            this.y -= 10;
        }

        ctx.beginPath();

        ctx.fillStyle = `rgba(${this.rgb.r}, ${this.rgb.g}, ${this.rgb.b}, 1)`;

        const g = ctx.createRadialGradient(this.x, this.y, this.radius * 0.01, this.x, this.y, this.radius);

        g.addColorStop(0, `rgba(${this.rgb.r}, ${this.rgb.g}, ${this.rgb.b}, 1)`);
        g.addColorStop(1, `rgba(${this.rgb.r}, ${this.rgb.g}, ${this.rgb.b}, 0)`);

        ctx.fillStyle = g;
        
        ctx.arc(this.x, this.y, this.radius, 0, PI2, false);
        ctx.fill();
    }
}

export class GradientAnimation {
    constructor(canvas) {
        this.canvas = canvas;
        this.ctx = this.canvas.getContext('2d');

        this.pixelRatio = (window.devicePixelRatio > 1) ? 2 : 1;

        this.totalParticles = COLOURS.length * 6;
        this.particles = [];
        this.maxRadius = this.getMaxRadius();
        this.minRadius = this.getMinRadius();

        window.addEventListener('resize', this.resize.bind(this), false);
        this.resize();
        this.createParticles();

        window.requestAnimationFrame(this.animate.bind(this));
    }

    getMaxRadius() {
        return document.body.clientWidth;
    }

    getMinRadius() {
        return document.body.clientWidth / 2;
    }

    resize() {
        this.stageWidth = document.body.clientWidth;
        this.stageHeight = document.body.clientHeight;
        this.maxRadius = this.getMaxRadius();
        this.minRadius = this.getMinRadius();

        this.canvas.width = this.stageWidth * this.pixelRatio;
        this.canvas.height = this.stageHeight * this.pixelRatio;
        this.ctx.scale(this.pixelRatio, this.pixelRatio);

        // this.ctx.globalCompositeOperation = 'luminosity';

        //this.createParticles();
    }

    createParticles() {
        let curColour = 0;
        this.particles = [];

        for (let i = 0; i < this.totalParticles; i++) {
            const item = new GlowParticle(
                Math.random() * this.stageWidth,
                Math.random() * this.stageHeight,
                Math.random() * (this.maxRadius - this.minRadius) + this.minRadius,
                COLOURS[curColour],
            );

            if (++curColour >= COLOURS.length) {
                curColour = 0;
            }

            this.particles[i] = item;
        }
    }

    animate() {
        window.requestAnimationFrame(this.animate.bind(this));

        this.ctx.clearRect(0, 0, this.stageWidth, this.stageHeight);

        for (let i = 0; i < this.totalParticles; i++) {
            const item = this.particles[i];
            item.animate(this.ctx, this.stageWidth, this.stageHeight);
        }
    }
}
