﻿{"version":"1.0","defaultScreenplayId":"SCP1","data":{"narrativeData":{"guid":"e3ced195-0c8b-48f6-b42c-f989e52b4f03","timestamp":"2013-03-03T20:44:18.004Z","title":"TAGAuthoringPreview","author":"TAG Authoring Tool","aspectRatio":"WideScreen","estimatedDuration":180,"description":"TAG Tour","branding":"TAG"}},"providers":{"ZMES":{"name":"MicrosoftResearch.Rin.ZoomableMediaExperienceStream","version":"1.0"},"AES":{"name":"MicrosoftResearch.Rin.AudioExperienceStream","version":"1.0"},"screenplayProvider":{"name":"MicrosoftResearch.Rin.DefaultScreenplayProvider","version":"1.0"},"FadeInOutTransitionService":{"name":"MicrosoftResearch.Rin.FadeInOutTransitionService","version":"1.0"},"InkES":{"name":"MicrosoftResearch.Rin.InkExperienceStream","version":"0.0"}},"resources":{"R-Track-0":{"uriReference":"http://23.21.147.138:8086/Images/20130303203159.mp3"},"R-Track-1":{"uriReference":"http://23.21.147.138:8086/Images/20130303203159.mp3"}},"experiences":{"Garibaldi Panorama-0":{"data":{"guid":"48880741-040a-4657-a3ef-0a2f9bbe27cd"},"providerId":"ZMES","resourceReferences":[{"resourceId":"R-Track-0","required":"true"}],"experienceStreams":{"Garibaldi Panorama-0-0":{"duration":19.818730439564792,"header":{"defaultKeyframeSequence":"Garibaldi Panorama-0-0"},"data":{"layerProperties":{"passthrough":false},"transition":{"providerId":"FadeInOutTransitionService","inDuration":0.5,"outDuration":0.5},"ContentType":"<SingleDeepZoomImage/>"},"keyframes":[{"offset":0,"init":true,"holdDuration":0,"data":{"default":"<ZoomableMediaKeyframe Media_Type='SingleDeepZoomImage' Viewport_X='-0.0007316089439137682' Viewport_Y='-0.017215305485528506' Viewport_Width='0.11894818802731537' Viewport_Height='0.047315978440553186'/>","TransitionTime":"<TransitionTime>3</TransitionTime>","PauseDuration":"<PauseDuration>1</PauseDuration>","keyframeThumbnail":"<Thumbnail></Thumbnail>"}},{"offset":0.7937284566588321,"init":false,"holdDuration":0,"data":{"default":"<ZoomableMediaKeyframe Media_Type='SingleDeepZoomImage' Viewport_X='-0.0007316089439137682' Viewport_Y='-0.017215305485528506' Viewport_Width='0.11894818802731537' Viewport_Height='0.047315978440553186'/>","TransitionTime":"<TransitionTime>3</TransitionTime>","PauseDuration":"<PauseDuration>1</PauseDuration>","keyframeThumbnail":"<Thumbnail></Thumbnail>"}},{"offset":20.173898470603813,"init":false,"holdDuration":0,"data":{"default":"<ZoomableMediaKeyframe Media_Type='SingleDeepZoomImage' Viewport_X='0.1649833932804767' Viewport_Y='-0.005100852219284338' Viewport_Width='0.06228761775337096' Viewport_Height='0.02477717086413389'/>","TransitionTime":"<TransitionTime>3</TransitionTime>","PauseDuration":"<PauseDuration>1</PauseDuration>","keyframeThumbnail":"<Thumbnail></Thumbnail>"}}]}},"id":"Garibaldi Panorama-0","experienceId":"Garibaldi Panorama-0"},"garibaldi-mastered.mp3":{"data":{},"providerId":"AES","resourceReferences":[{"resourceId":"R-Track-1","required":"true"}],"experienceStreams":{"garibaldi-mastered.mp3-0":{"duration":20.318730439564792,"header":{"defaultKeyframeSequence":"garibaldi-mastered.mp3-0"},"data":{"layerProperties":{"passthrough":false},"transition":{"providerId":"FadeInOutTransitionService","inDuration":0.5,"outDuration":0.5}},"keyframes":[]}},"id":"garibaldi-mastered.mp3","experienceId":"garibaldi-mastered.mp3"}},"screenplays":{"SCP1":{"data":{"experienceStreamReferences":[{"experienceId":"Garibaldi Panorama-0","experienceStreamId":"Garibaldi Panorama-0-0","begin":0,"duration":20.318730439564792,"layer":"foreground","dominantMedia":"visual","volume":1},{"experienceId":"garibaldi-mastered.mp3","experienceStreamId":"garibaldi-mastered.mp3-0","begin":0,"duration":20.818730439564792,"layer":"foreground","dominantMedia":"audio","volume":1}]}}}}