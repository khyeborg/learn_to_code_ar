<!DOCTYPE html>
<html lang="en-us">
  <head>
  		<!-- A-Frame libraries -->
        <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>

        <!-- ARToolKit for A-Frame VR Library -->
        <script src='libraries/aframe-ar.js'></script>

        <!-- P5 libraries -->
        <script src="https://cdn.jsdelivr.net/npm/p5@1.1.9/lib/p5.js"></script>

        <!-- Craig's AFrameP5 AR library -->
        <script src="https://craignyu.github.io/aframep5-ar/libraries/aframep5_ar.js"></script>

    <!-- the standard p5 drawing and animation library -->
    <!-- <script src="../../p5/p5.min.js"></script> -->

    <!-- the standard p5 sound library
         note: this library will fail if not loaded over
         a secure connection (https) or on your localhost) -->
    <script src="p5/addons/p5.sound.min.js"></script>

    <!-- your custom sketch file -->
    <script src="sketch.js"></script>
    <style>
    	body {
            padding: 0;
            margin: 0;
            overflow: hidden;
            }
            
            @media screen and (orientation:portrait) {
                #portrait_warning {
                    position: fixed;
                    top: 0px;
                    left: 0px;
                    width: 100%;
                    height: 100%;
                    text-align: center;
                    background: white;
                    z-index: 1000;
                    display: block;
                }
            }

      /* hides the rotational warning when the screen is in landscape mode */
            @media screen and (orientation:landscape) {
                #portrait_warning {
                    display: none;
                }
            }
    </style>
  </head>

  <body>
  	<!-- modal box to tell the user to rotate their device into landscape mode - the AR toolkit only reliably renders in landscape mode -->
    <div id="portrait_warning">
        <h1>Rotate your device into landscape mode!</h1>
    </div>

    <!-- Define A-Frame VR Scene and set it up so that it will be manipulated through AR.js -->
    <a-scene id="ARScene" embedded arjs='sourceType: webcam; debugUIEnabled: false; detectionMode: mono;'>
    	<a-marker id="diglettMarker" preset="custom" url="Markers/Diglett.patt"></a-marker>
    	 <a-marker id="bulbasaurMarker" preset="custom" url="Markers/Bulbasaur.patt"></a-marker>
        <a-entity camera></a-entity>
    </a-scene>

    <script>
      



      let iframesrcArray = ['artwork1.php', 'artwork2.php'];
      let myRefArray = [];
      let iframeArray = [];

      for (let i = 0; i < iframesrcArray.length; i++) {
        // dynamically add the iframe(s) to the page
        let iframe = document.createElement('iframe');
        iframe.src = iframesrcArray[i];
        iframe.style.display = 'none';
        document.querySelector('body').appendChild(iframe);

        // global var to keep track of iframe references
        myRefArray.push(false);

        iframeArray.push(iframe);
      }

      // in a moment grab a ref to the iframe canvas
      setTimeout(startProcess, 100);

      function startProcess() {
        for (let i = 0; i < iframesrcArray.length; i++) {
          myRefArray[i] = iframeArray[i].contentDocument.querySelector('canvas');
        }

        for (let i = 0; i < myRefArray.length; i++) {
          if (!myRefArray[i]) {
            console.log("not ready yet, trying again in a moment ...");
            setTimeout(startProcess, 100);
            break;
          }
        }
      }

    </script>
  </body>
</html>
