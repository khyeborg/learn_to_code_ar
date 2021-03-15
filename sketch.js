// single image object to copy the data from the iframe canvas
let imgArray = [];

// marker variables
let markersArray = [];

// canvas variables
let canvasSize = 160;

// setup function - used for commands that need to run only once
function setup() {
  // construct the A-Frame world
  world = new World('ARScene');
  // createCanvas(500, 500)
  background(128);

  // grab a reference to our marker in the HTML document
  markersArray.push(world.getMarker("diglettMarker"));
  markersArray.push(world.getMarker("bulbasaurMarker"));

  for (let i = 0; i < iframesrcArray.length; i++) {
    imgArray.push(false);
  }
}

// draw function - used for commands that need to be repeated
function draw() {
	world.clearDrawingCanvas();

  for (let i = 0; i < iframesrcArray.length; i++) {
    if (myRefArray[i] && !imgArray[i]) {
      // create our image to match the size of the canvas here
      // (note the size may be different than the size used in the
      // 'createCanvas' function due to the pixel density of the client's
      // machine)
      imgArray[i] = createImage(myRefArray[i].width, myRefArray[i].height);
    }

    // we have a reference and an image
    else if (myRefArray[i] && imgArray[i]) {

      // use the markers as positional controllers
      if (markersArray[i].isVisible()) {
        // draw the data from the canvas directly to our temporary image
        imgArray[i].drawingContext.drawImage(myRefArray[i], 0, 0);

        // get the position of this marker
        let position = markersArray[i].getScreenPosition();
        
        // image drawingCanvas on the marker
        imageMode(CENTER);

        // image + scale
        image(imgArray[i], position.x, position.y, canvasSize, canvasSize);
      }
    }
  }
}
