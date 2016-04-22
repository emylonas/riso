$(document).ready(function() {
  //side 1 specific arrays
  var _side1 = []; 
  var _side1WidthSoFar = [];
  var _side1English = [];
  var _side1EnglishLoaded = []; 
  var _side1Italian = []; 
  var _side1ItalianLoaded = [];
  var _side1Num = 27; 
  var _side1TotalWidth = 0;
  for (var i = 0; i < _side1Num; i++) {
    _side1EnglishLoaded[i] = false; 
    _side1ItalianLoaded[i] = false; 
  }

  //side 2 specific arrays
  var _side2 = []; 
  var _side2WidthSoFar = [];
  var _side2English = [];
  var _side2EnglishLoaded = []; 
  var _side2Italian = []; 
  var _side2ItalianLoaded = [];
  var _side2Num = 22; 
  var _side2TotalWidth = 0;
  for (var i = 0; i < _side2Num; i++) {
    _side2EnglishLoaded[i] = false; 
    _side2ItalianLoaded[i] = false; 
  }

  //kees track of which images are loaded and image location during animation
  var _currentLocation = 0; 
  var _currentIndex = 0;   
  var _imagesLoaded = 0; 
  var _tracksLoaded = 0; 
  var _playingAudioIndex = 0; 
  var _slideLabelModifier = 0; 

  //basic canvas information, such as which side is showing and canvas height.
  var _sideShowing = 1; 
  var _canvasHeight = "520"; 

  //stores jquery selectors for the two canvases
  var _canvas1 = $("#side1Canvas canvas");
  var _context1 = _canvas1.get(0).getContext("2d");
  var _canvas2 = $("#side2Canvas canvas");
  var _context2 = _canvas2.get(0).getContext("2d");

  var _canvasWidth = _canvas1.width(); 
  var _canvasWidthModifier = 15; 
  var _loadingOverlay = $("#loadingOverlay"); 

  //booleans for coordinating animation 
  var _playAnimation = false; 
  var _animateToFinished = true; 
  var _imagesReady = false; 
  var _audioReady = false; 
  var _withEnglish = false; 
  var _soundBackAnimation = false;
  var _firstTimeFlip = true;  

  //stores jquery button selectors
  var _playNoSoundButton = $("#startAnimationNoSound");
  var _playEnglishButton = $("#startAnimationEnglish");
  var _playItalianButton = $("#startAnimationItalian");
  var _stopButton = $("#stopAnimation");
  var _backButton = $("#jumpBack");
  var _forwardButton = $("#jumpForward");
  var _currentSlideLabel = $("#currentSlideLabel");
  var _flipSides = $("#flip"); 
  var _playBar = $("#playBar"); 
  var _flipBar = $("#flipBar"); 
  var _stopBar = $("#stopBar"); 
  var _allControls = $(".control"); 

  /*
  * Utility methods
  */

  //HEIGHT of the images is 520 px -- we've hardcoded this number above
  function resizeCanvas() {
    var canvas = (_sideShowing == 1) ? _canvas1 : _canvas2;
    var context = (_sideShowing == 1) ? _context1 : _context2; 
    var images = (_sideShowing == 1) ? _side1 : _side2; 

    canvas.attr("width", $(window).get(0).innerWidth - _canvasWidthModifier);
    canvas.attr("height", _canvasHeight); 
    _canvasWidth = canvas.width(); 
    _loadingOverlay.height(_canvasHeight).width(_canvasWidth); 

    context.clearRect(0, 0, _canvasWidth, _canvasHeight); 
    drawImagesAndSound(images, _currentLocation); 
  }

  //helper method to pad numbers with a leading zero so they match file names
  function pad(num, width, z) {
    z = z || "0"; 
    num = num.toString() + ""; 
    return num.length >= width ? num : new Array(width - num.length + 1).join(z) + num; 
  }

  //shows or hides loading overlay
  function toggleLoading() {
    if (_loadingOverlay.css('display') == 'none') {
      _loadingOverlay.fadeIn(); 
    }
    else {
      _loadingOverlay.fadeOut();  
    }
  }


  /*
  * Handles the initial loading of images and audio
  */

  //load all the images for one side
  function loadImages() {
    var path = (_sideShowing == 1) ? "./side1/side1_scene" : "./side2/side2_scene";
    var images = (_sideShowing == 1) ? _side1 : _side2; 
    var numImages = (_sideShowing == 1) ? _side1Num : _side2Num;
    var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar;  

    var counter = 0;
    _imagesLoaded = 0;  
    
    //Load images!
    for (counter = 1; counter <= numImages; counter++) {
      var img = new Image(); 
      img.src = path + pad(counter, 2) + ".jpg"; 
      images.push(img);

      $(img).on("load", function() {
        var navImage = (_sideShowing == 1) ? $("#side1NavImg") : $("#side2NavImg"); 
        _imagesLoaded++; 

        //when all images are loaded, call the drawImagesAndSound function to draw the images
        if (_imagesLoaded == numImages) {
          var totalWidth = (_sideShowing == 1) ? _side1TotalWidth : _side2TotalWidth; 
          totalWidth = 0; 

          //iterate through all pictures to get the true total width
          for (var i = 0; i < images.length; i++) {
            widthSoFar[i] = totalWidth; 
            totalWidth = totalWidth + images[i].width; 
            if (_sideShowing == 1) {
              _side1TotalWidth = _side1TotalWidth + images[i].width;
            }
            else {
              _side2TotalWidth = _side2TotalWidth + images[i].width;
            }
            
          }
          
          _currentLocation = 0; 
          _currentIndex = 0; 
          _imagesReady = true; 
          
          if (_audioReady) {
            navImage.fadeIn(); 
            _playBar.fadeIn(); 
            _flipBar.fadeIn(); 

            _backButton.fadeIn(); 
            _forwardButton.fadeIn(); 
            _currentSlideLabel.fadeIn();

            resizeCanvas();
            toggleLoading(); 
            
            drawImagesAndSound(images, _currentLocation); 
          }
        }
      });
    }
  }

  //Load the audio for both languages FOR THE FIRST TWO SCENES
  //Allow the audio for the other scenes to load in the background
  function preloadAudio() {
    var english = (_sideShowing == 1) ? _side1English : _side2English; 
    var italian = (_sideShowing == 1) ? _side1Italian : _side2Italian; 
    var audio = (_withEnglish) ? english : italian; 
    
    var englishLoaded = (_sideShowing == 1) ? _side1EnglishLoaded : _side2EnglishLoaded; 
    var italianLoaded = (_sideShowing == 1) ? _side1ItalianLoaded : _side2ItalianLoaded; 
    var audioLoaded = (_withEnglish) ? englishLoaded : italianLoaded; 

    var englishPath = (_sideShowing == 1) ? "./audio/scene_" : "./audio2/scene_";
    var italianPath = (_sideShowing == 1) ? "./audio3/iscene_" : "./audio4/iscene_";

    var images = (_sideShowing == 1) ? _side1 : _side2; 
    var counter = 0;
    _tracksLoaded = 0;  

    //Load tracks in both languages for the first two scenes
    for (counter = 1; counter <= 2; counter++) {
      
      //function called with the track can be played
      var audioFunction = function(trackIndex, isEnglish) {
        _tracksLoaded++; 
        var loaded = (isEnglish) ? englishLoaded : italianLoaded; 
        var navImage = (_sideShowing == 1) ? $("#side1NavImg") : $("#side2NavImg"); 
        loaded[trackIndex] = true; 

        if (_tracksLoaded == 4) {
          _audioReady = true; 
          
          if (_imagesReady) {
            _currentLocation = 0; 
            _currentIndex = 0; 

            navImage.fadeIn(); 
            _playBar.fadeIn(); 
            _flipBar.fadeIn(); 

            _backButton.fadeIn(); 
            _forwardButton.fadeIn(); 
            _currentSlideLabel.fadeIn();

            resizeCanvas();
            toggleLoading(); 

            drawImagesAndSound(images, _currentLocation);
          }
        }
      }; 

      var index = counter - 1; 
      //English audio
      var englishAudio = new Audio(); 
      englishAudio.src = englishPath + pad(counter, 2) + ".mp3"; 
      englishAudio.addEventListener("canplay", function(val) {
        return audioFunction(val, true); 
      }(index));
      english[index] = englishAudio;

      //Italian audio 
      var italianAudio = new Audio(); 
      italianAudio.src = italianPath + pad(counter, 2) + ".mp3"; 
      italianAudio.addEventListener("canplay", function(val) {
        return audioFunction(val, false); 
      }(index)); 
      italian[index] = italianAudio; 
    }
  }


  /*
  * Handles drawing the canvas with the appropriate images
  */

  function getIndexAndOffsetFromLocation(location, images) {
    var widthSoFar = 0;
    var index = -1; 
    var offset = 0; 

    do {
      index ++; 
      widthSoFar = widthSoFar + images[index].width; 
    } while (widthSoFar < location); 
    var widthExcludingThis = widthSoFar - images[index].width; 

    offset = -1 * (location - widthExcludingThis); 

    return [index, offset]; 
  }

  function drawImagesAndSound(images, location) {
    var context = (_sideShowing == 1) ? _context1 : _context2; 
    var numImages = (_sideShowing == 1) ? _side1Num : _side2Num; 
    var images = (_sideShowing == 1) ? _side1 : _side2; 

    var result = getIndexAndOffsetFromLocation(location, images);
    var index = result[0]; 
    var indexOffset = result[1]; 

    //_currentIndex used by the back and forward buttons
    _currentIndex = index; 
    var widthSoFar = indexOffset; 
    var firstPicture = true; 

    context.clearRect(0, 0, _canvasWidth, _canvasHeight); 

    //while the width of canvas exceeds the width of the pictures we've tiled so far
    while ((widthSoFar < _canvasWidth) && (index < numImages)) {
      var img = images[index];  

      if (firstPicture) {
        context.drawImage(img, indexOffset, 0)
        firstPicture = false; 
      } else {
        context.drawImage(img, widthSoFar, 0);
      }

      widthSoFar = widthSoFar + images[index].width;
      index++; 
    }
  }


  /*
  * Handles the animation the images and coordination with audio
  */

  function animateNoSound() {
    var context = (_sideShowing == 1) ? _context1 : _context2; 
    var images = (_sideShowing == 1) ? _side1 : _side2; 
    var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 
    var reachedEnd = (_currentLocation >= (widthSoFar[images.length - 1] + images[images.length - 1].width - _canvasWidth));

    if (_playAnimation && _imagesReady && _audioReady && _animateToFinished && !reachedEnd) {
      setTimeout(animateNoSound, 33);

      context.clearRect(0, 0, _canvasWidth, _canvasHeight); 
      drawImagesAndSound(images, _currentLocation)
      _currentLocation = _currentLocation + 2; 
    }

    //This text updater changes the current slide exactly when the new slides starts
    //The other text updater in the forward/back buttons change it a little bit before.
    if ((_currentIndex < (images.length - 1)) && (_currentLocation >= widthSoFar[_currentIndex + 1] - (images[_currentIndex + 1].width/4))) {
      _currentSlideLabel.text("SCENE " + (_currentIndex + 2 + _slideLabelModifier));
    } 
    else {
      _currentSlideLabel.text("SCENE " + (_currentIndex + 1 + _slideLabelModifier));
    }

    if (reachedEnd) {
      stopFunction(); 
    }
  }

  //animates to the location passed in about 3 seconds 
  function animateTo(location) {
    var context = (_sideShowing == 1) ? _context1 : _context2; 
    var images = (_sideShowing == 1) ? _side1 : _side2; 
    
    if (Math.abs(_currentLocation - location) > 2 && (!_animateToFinished)) {
      var rate = 50; 
      var steps = 5; 

      setTimeout(function() {
        animateTo(location); 
      }, rate);

      context.clearRect(0, 0, _canvasWidth, _canvasHeight); 
      
      drawImagesAndSound(images, _currentLocation); 
      
      var difference = location - _currentLocation; 
      _currentLocation = _currentLocation + difference/steps; 
    } 
    //set the location to exactly where we want to be. 
    else {
      _currentLocation = location; 
      drawImagesAndSound(images, _currentLocation); 
      _animateToFinished = true; 
      
      if (_soundBackAnimation) {
        prepareToAnimateWithSound(); 
        _soundBackAnimation = false; 
      }
    }
  }

  //the scene will always be buffered by 1/4 of the image width when this is called!!!
  function prepareToAnimateWithSound() {
    var english = (_sideShowing == 1) ? _side1English : _side2English; 
    var italian = (_sideShowing == 1) ? _side1Italian : _side2Italian; 
    var audio = (_withEnglish) ? english : italian; 
    
    var englishLoaded = (_sideShowing == 1) ? _side1EnglishLoaded : _side2EnglishLoaded; 
    var italianLoaded = (_sideShowing == 1) ? _side1ItalianLoaded : _side2ItalianLoaded; 
    var audioLoaded = (_withEnglish) ? englishLoaded : italianLoaded; 

    var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 

    //we set the index to one more greater than the _currentIndex because we know that
    //this method will always be called when the scene is 1/4*image's width to the right of 
    //the edge of the canvas. This means that the _currentIndex is actually considered to be
    //the index BEFORE, which means we need to add 1 to bring the index to the correct index
    var index = _currentIndex + 1; 
    var sceneNumber = index + 1; 

    //we distinguish the first scene as the only one where the currentLocation is negative
    if (_currentLocation < 0) {
      index = 0; 
      sceneNumber = 1;   
    }
    
    var path = ""; 
    if (_withEnglish) {
      path = (_sideShowing == 1) ? "./audio/scene_" : "./audio2/scene_";
    }
    else {
      path = (_sideShowing == 1) ? "./audio3/iscene_" : "./audio4/iscene_";
    }

    //if audio for the scene we need to show hasn't been loaded yet
    if (!audioLoaded[index]) {
      toggleLoading(); 
      var sound = new Audio(); 
      sound.src = path + pad(sceneNumber, 2) + ".mp3"; 

      sound.addEventListener("canplay", function() {
        toggleLoading(); 
        audioLoaded[index] = true; 
        animateWithSound(index, true, 0, false);
      });

      audio[index] = sound;
    }
    //otherwise, play the audio directly if it has already been loaded
    else {
      animateWithSound(index, true, 0, false);
    }
  }

  function animateWithSound(index, firstCall, step, loadingNext) {
    var context = (_sideShowing == 1) ? _context1 : _context2; 
    var images = (_sideShowing == 1) ? _side1 : _side2; 
    
    var english = (_sideShowing == 1) ? _side1English : _side2English; 
    var italian = (_sideShowing == 1) ? _side1Italian : _side2Italian; 
    var audio = (_withEnglish) ? english : italian; 
    
    var englishLoaded = (_sideShowing == 1) ? _side1EnglishLoaded : _side2EnglishLoaded; 
    var italianLoaded = (_sideShowing == 1) ? _side1ItalianLoaded : _side2ItalianLoaded; 
    var audioLoaded = (_withEnglish) ? englishLoaded : italianLoaded; 

    var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 
    var totalWidth = (_sideShowing == 1) ? _side1TotalWidth : _side2TotalWidth; 

    if (_playAnimation && _imagesReady && _audioReady && _animateToFinished) {
      var rate = 45; 
      var increment; 

      //audio will ALWAYS be ready for this index when this function is called!
      if (firstCall) {
        //calculate increment for the animation 
        //if this isn't the last scene
        if (index != images.length - 1) {
          var width = images[index].width * (5/4) - images[index + 1].width * (1/4); 
          //convert from second to millisecond by multiplying by 1000
          var audioTime = audio[index].duration * 1000; 
          increment = (rate * width)/audioTime;    
        }
        //otherwise, if this is the last index
        else {
          var toLeaveLeftover = (_canvasWidth > images[images.length - 1].width) ? images[images.length - 1].width : _canvasWidth;
          var width = totalWidth - toLeaveLeftover - _currentLocation; 
          //convert from second to millisecond by multiplying by 1000
          var audioTime = audio[index].duration * 1000; 
          increment = (rate * width)/audioTime;
        }
        
        _playingAudioIndex = index; 
        audio[index].play(); 
      } 

      //subsequent calls after the first call
      else {
        increment = step; 
        var nextIndex = index + 1; 
        var nextSCENENumber = nextIndex + 1; 

        if ((index < (images.length - 1)) && !loadingNext && !audioLoaded[nextIndex]) {
          var path = ""; 
          if (_withEnglish) {
            path = (_sideShowing == 1) ? "./audio/scene_" : "./audio2/scene_";
          }
          else {
            path = (_sideShowing == 1) ? "./audio3/iscene_" : "./audio4/iscene_";
          }

          loadingNext = true; 
          var sound = new Audio(); 
          sound.src = path + pad(nextSCENENumber, 2) + ".mp3"; 
          
          sound.addEventListener("canplay", function() {
            audioLoaded[nextIndex] = true; 
          });
          
          audio[nextIndex] = sound;
        }
      }

      //one scene is ending and it is time to start the next scene!
      //if we are not the last element
      if (index < (images.length - 1)) {
        if (_currentLocation >= (widthSoFar[index + 1] - (images[index + 1].width * 1/4))) {
          index++; 
          loadingNext = false; 

          _playingAudioIndex = index; 
          audio[index].play(); 

          //calculate increment for the animation 
          //if this isn't the last scene
          if (index != (images.length - 1)) {
            var width = images[index].width * (5/4) - images[index + 1].width * (1/4); 
            //convert from second to millisecond by multiplying by 1000
            var audioTime = audio[index].duration * 1000; 
            increment = (rate * width)/audioTime;
          }
          //otherwise, if this is the last index
          else {
            var toLeaveLeftover = (_canvasWidth > images[images.length - 1].width) ? images[images.length - 1].width : _canvasWidth;
            var width = totalWidth - toLeaveLeftover - _currentLocation; 
            //convert from second to millisecond by multiplying by 1000
            var audioTime = audio[index].duration * 1000; 
            increment = (rate * width)/audioTime;
          }
        }
      }

      var toLeaveLeftover = (_canvasWidth > images[images.length - 1].width) ? images[images.length - 1].width : _canvasWidth; 
      var reachedEnd = (_currentLocation >= (totalWidth - toLeaveLeftover));

      //place here so we can benefit from the incremented index in the loop before 
      if (!reachedEnd) {
        setTimeout(function() {
          animateWithSound(index, false, increment, loadingNext); 
        }, rate);

        context.clearRect(0, 0, _canvasWidth, _canvasHeight); 
        drawImagesAndSound(images, _currentLocation); 
        _currentLocation = _currentLocation + increment; 
      } 

      //This text updater changes the current slide exactly when the new slides starts
      //The other text updater in the forward/back buttons change it a little bit before.
      if ((_currentIndex < (images.length - 1)) && (_currentLocation >= widthSoFar[_currentIndex + 1] - (images[_currentIndex + 1].width/4))) {
        _currentSlideLabel.text("SCENE " + (_currentIndex + 2 + _slideLabelModifier));
      } 
      else {
        _currentSlideLabel.text("SCENE " + (_currentIndex + 1 + _slideLabelModifier));
      }
      
      //if you reached the end, call the stop function! 
      if (reachedEnd) {
        audio[_playingAudioIndex].addEventListener("ended", stopFunction); 
      }
    }
  }


  /*
  * Initial setup of which buttons should be shown and which should be hidden 
  */
  $("#side1NavImg").hide(); 
  $("#side2NavImg").hide(); 
  _playBar.hide(); 
  _stopBar.hide(); 
  _flipBar.hide(); 
  
  _backButton.hide(); 
  _forwardButton.hide(); 
  _currentSlideLabel.hide(); 


  /*
  * Installs the click callback functions for each of the buttons
  */

  $("#garibaldiHTML5").hover(function() {
    //executed when mouse enters
    $(".visible").fadeIn(1000); 
    _currentSlideLabel.fadeIn(1000); 
  }, function() {
    //executed when mouse leaves
    if (_playAnimation) {
      $(".visible").fadeOut("slow");   
      _currentSlideLabel.fadeOut("slow"); 
    }
  }); 

  _flipSides.click(function() {
    if (_animateToFinished && !_playAnimation) {
      var side = (_sideShowing == 1) ? $("#side1Canvas") : $("#side2Canvas");
      var images = (_sideShowing == 1) ? _side1 : _side2; 
      var context = (_sideShowing == 1) ? _context1 : _context2; 

      side.hide(); 
      _sideShowing = (_sideShowing == 1) ? 2 : 1; 

      side = (_sideShowing == 1) ? $("#side1Canvas") : $("#side2Canvas");
      images = (_sideShowing == 1) ? _side1 : _side2; 
      
      side.fadeIn(); 
      
      //if this is the first time we're flipping to side 2, we need to set it up!
      if (_firstTimeFlip) {
        _firstTimeFlip = false; 
        _imagesReady = false; 
        _audioReady = false;

        _slideLabelModifier = 27; 
        _imagesLoaded = 0; 
        _tracksLoaded = 0;  

        toggleLoading(); 
        preloadAudio(); 
        loadImages(); 
        _currentSlideLabel.text("SCENE 28");
      } 
      //for subsequent flips, after we've loaded both sides, 
      //we want to start at the very beginning of each side if we flip back to that side
      else {
        _currentLocation = 0; 
        _currentIndex = 0; 

        if (_sideShowing == 1) {
          _slideLabelModifier = 0; 
          _currentSlideLabel.text("SCENE 1");
        }
        else {
          _slideLabelModifier = 27; 
          _currentSlideLabel.text("SCENE 28");
        }

        _animateToFinished = false; 
        animateTo(_currentLocation); 
      }

    }
  }); 

  _playNoSoundButton.click(function() {
    if (_animateToFinished) {
      _allControls.toggleClass("visible"); 

      _playBar.fadeOut(); 
      _flipBar.fadeOut(); 
      _backButton.fadeOut(); 
      _forwardButton.fadeOut(); 

      _stopBar.fadeIn(); 

      _playAnimation = true; 
      animateNoSound();
    }
  }); 

  _playEnglishButton.click(function() {
    if (_animateToFinished) {
      var images = (_sideShowing == 1) ? _side1 : _side2; 
      var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 

      _allControls.toggleClass("visible"); 

      _playBar.fadeOut(); 
      _flipBar.fadeOut(); 
      _backButton.fadeOut(); 
      _forwardButton.fadeOut(); 

      _stopBar.fadeIn();  

      _playAnimation = true; 
      _withEnglish = true; 

      if (_currentLocation == widthSoFar[_currentIndex + 1] - (images[_currentIndex + 1].width/4)) {
        prepareToAnimateWithSound();
      } 
      else {
        //snap back to the nearest slide before beginning to play the audio
        var index = ((_currentLocation >= widthSoFar[_currentIndex + 1] - (images[_currentIndex + 1].width/4)) && (_currentLocation <= widthSoFar[_currentIndex + 1])) ? (_currentIndex + 1) : _currentIndex; 

        //prepareToAnimateWithSound will be called at the end of animateTo if _soundBackAnimation is set to true
        _soundBackAnimation = true; 
        _animateToFinished = false; 
        animateTo(widthSoFar[index] - (images[index].width/4))
      }
    }
  }); 

  _playItalianButton.click(function() {
    if (_animateToFinished) {
      var images = (_sideShowing == 1) ? _side1 : _side2; 
      var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 

      _allControls.toggleClass("visible"); 

      _playBar.fadeOut(); 
      _flipBar.fadeOut(); 
      _backButton.fadeOut(); 
      _forwardButton.fadeOut(); 

      _stopBar.fadeIn(); 

      _playAnimation = true; 
      _withEnglish = false; 

      if (_currentLocation == widthSoFar[_currentIndex + 1] - (images[_currentIndex + 1].width/4)) {
        prepareToAnimateWithSound();
      } 
      else {
        //snap back to the nearest slide before beginning to play the audio
        var index = ((_currentLocation >= widthSoFar[_currentIndex + 1] - (images[_currentIndex + 1].width/4)) && (_currentLocation <= widthSoFar[_currentIndex + 1])) ? (_currentIndex + 1) : _currentIndex; 

        //prepareToAnimateWithSound will be called at the end of animateTo if _soundBackAnimation is set to true
        _soundBackAnimation = true; 
        _animateToFinished = false; 
        animateTo(widthSoFar[index] - (images[index].width/4))
      }
    }
  }); 

  
  _stopButton.click(stopFunction);
  function stopFunction() {
    if (_animateToFinished) {
      var english = (_sideShowing == 1) ? _side1English : _side2English; 
      var italian = (_sideShowing == 1) ? _side1Italian : _side2Italian; 
      var audio = (_withEnglish) ? english : italian; 

      //pause sound that may be playing
      var sound = audio[_playingAudioIndex]; 
      sound.pause();
      sound.currentTime = "0";

      //if we call stop in one of the middle scenes
      //we don't always want to stop after that scene in later runs
      sound.removeEventListener("ended", stopFunction); 

      _allControls.toggleClass("visible"); 

      _stopBar.fadeOut(); 

      _playBar.fadeIn(); 
      _flipBar.fadeIn(); 
      _backButton.fadeIn(); 
      _forwardButton.fadeIn();

      _playAnimation = false; 
      _animateToFinished = true; 
    }
  }

  _forwardButton.click(function() {
    var images = (_sideShowing == 1) ? _side1 : _side2; 
    var context = (_sideShowing == 1) ? _context1 : _context2; 
    var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 

    if (_animateToFinished) {
      var nextIndex = _currentIndex + 1; 

      //if current location is within a fourth of the width of the next one, 
      //we count this as already being in the next image so we count it as being in the image after the next
      if (_currentLocation >= widthSoFar[nextIndex] - (images[nextIndex].width/4)) {
        nextIndex++; 
      }

      if (nextIndex < images.length) {

        context.clearRect(0, 0, _canvasWidth, _canvasHeight);
        var location = widthSoFar[nextIndex] - (images[nextIndex].width/4); 

        _animateToFinished = false; 
        animateTo(location);   

        //This text updater changes the current slide a little bit before it actually starts
        //The other text updater in the animate function changes the current slide exactly when it starts
        _currentSlideLabel.text("SCENE " + (nextIndex + 1 + _slideLabelModifier));  
      }
    }
  }); 


  _backButton.click(function() {
    var images = (_sideShowing == 1) ? _side1 : _side2; 
    var context = (_sideShowing == 1) ? _context1 : _context2; 
    var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 

    //This condition is asking if we have within 1/4 of the length of the NEXT SCENE
    //if we are 1/4 of the length of the next scene, we actually CONSIDER OURSELVES TO 
    //BE IN THE NEXT SCENE, NOT THIS SCENE!
    if (_animateToFinished) {
      _animateToFinished = false; 

      // The reason why the previous index is equal to the current index is because 
      // we consider the scene to be the NEXT SCENE when we are within 1/4 of the length
      // of the NEXT SCENE 
      // HOWEVER, our actually image scrolling mechanism doesn't consider this to be the case
      // THEREFORE, it still thinks we're in the current scene, when we are actually in the
      // NEXT SCENE!
      var index = _currentIndex; 
      context.clearRect(0, 0, _canvasWidth, _canvasHeight);

      if (_currentLocation > widthSoFar[_currentIndex + 1] - (images[_currentIndex + 1].width/4)) {
        index++;         
      }
      var location = widthSoFar[index] - (images[index].width/4); 
      
      animateTo(location);

      _currentSlideLabel.text("SCENE " + (index + 1 + _slideLabelModifier));
    }
  });  


  $(".navImg").mousemove(function (event) {
    if (_imagesReady && _audioReady && !_playAnimation) {
      var offset = $(this).offset(); 
      if (_sideShowing == 1) {
        var rawPercent = Math.round((event.pageX - offset.left)/$("#side1NavImg img").width() * 100); 
        $("#side1NavImg .navImgHelp").text(rawPercent + "%").css("left", "-6%");
      }
      else {
        var rawPercent = Math.round((event.pageX - offset.left)/$("#side2NavImg img").width() * 100); 
        $("#side2NavImg .navImgHelp").text(rawPercent + "%").css("left", "-6%");
      }  
    }
  }).mouseleave(function() {
    $(".navImgHelp").text("JUMP TO LOCATION").css("left", "-19%"); 
  }).click(function (event) {
    if (_animateToFinished && _imagesReady && _audioReady && !_playAnimation) {
      var widthSoFar = (_sideShowing == 1) ? _side1WidthSoFar : _side2WidthSoFar; 
      var totalWidth = (_sideShowing == 1) ? _side1TotalWidth : _side2TotalWidth;  
      var offset = $(this).offset();
      var jumpLocation;

      if (_sideShowing == 1) {
        jumpLocation = Math.floor((event.pageX - offset.left)/$("#side1NavImg img").width() * _side1TotalWidth)
      }
      else {
        jumpLocation = Math.floor((event.pageX - offset.left)/$("#side2NavImg img").width() * _side2TotalWidth)
      }

      //jump to the location specified 
      _animateToFinished = false; 
      animateTo(jumpLocation); 

      //update slide label to reflect new scene number
      //search through the width array until you get to a width that exceeds your jumpLocation
      var slideNumber = 0; 
      for (var i = 0; i < widthSoFar.length; i++) {
        if (widthSoFar[i] > jumpLocation) {
          slideNumber = i + 1; 
          break; 
        } else if (totalWidth > jumpLocation) {
          slideNumber = widthSoFar.length; 
        }
      }
      _currentSlideLabel.text("SCENE " + (slideNumber + _slideLabelModifier));
    }
  }); 


  /*
  * Starts the loading process
  */
  //readjust the initial size of the components if needed
  _canvas1.attr("width", $(window).get(0).innerWidth - _canvasWidthModifier);
  _canvas1.attr("height", _canvasHeight); 
  _canvas2.attr("width", $(window).get(0).innerWidth - _canvasWidthModifier);
  _canvas2.attr("height", _canvasHeight); 

  var canvas = (_sideShowing == 1) ? _canvas1 : _canvas2;
  _canvasWidth = canvas.width(); 
  _loadingOverlay.height(_canvasHeight).width(_canvasWidth); 

  toggleLoading(); 
  preloadAudio(); 
  loadImages(); 

  $(window).resize(resizeCanvas); 
});