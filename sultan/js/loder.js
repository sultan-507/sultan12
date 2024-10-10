var ctx = document.getElementById('circularLoader').getContext('2d');
var al = 0;
var start = 4.72;
var cw = ctx.canvas.width;
var ch = ctx.canvas.height; 
var diff;
var sim;

function progressSim(){
	diff = ((al / 100) * Math.PI*2*10).toFixed(2);
	ctx.clearRect(0, 0, cw, ch);
	ctx.lineWidth = 17;
	ctx.fillStyle = '#fff';
	ctx.strokeStyle = "#777d98";
	ctx.textAlign = "center";
	ctx.font="28px monospace";
	ctx.fillText(al+'%', cw*.52, ch*.5+5, cw+12);
	ctx.beginPath();
	ctx.arc(100, 100, 75, start, diff/10+start, false);
	ctx.stroke();
	if(al >= 100){
		clearTimeout(sim);
	    // here

		const end = Date.now() + 15 * 180;

		// go Buckeyes!
		const colors = ["#777d98", "#272e4f"];
		
		(function frame() {
		  confetti({
			particleCount: 2,
			angle: 60,
			spread: 55,
			origin: { x: 0 },
			colors: colors,
		  });
		
		  confetti({
			particleCount: 2,
			angle: 120,
			spread: 55,
			origin: { x: 1 },
			colors: colors,
		  });
		
		  if (Date.now() < end) {
			requestAnimationFrame(frame);
		  }
		})();

		// finish
        myModal.show();
        loader.style.display = 'none';
	}
	al++;
}



// إختيار الرابح
const win = document.querySelector("#winner");
const loader = document.querySelector(".loader-con");

var myModal = new bootstrap.Modal(document.getElementById('modal'), {
  keyboard: false
})

win.addEventListener('click', function(){
  loader.style.display = 'block';
  sim = setInterval(progressSim, 10);

});