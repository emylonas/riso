<?php require_once("../../../dependencies/functions.php");
$header = <<<TIMELINE
<script src="api/timeline-api.js" type="text/javascript"></script>
<style type="text/css">
.timeline-copyright{
  display: none;
  opacity: 0;
  visible: hidden;
}

.t-highlight1{background-color:#ccf;}
.p-highlight1{background-color:#fcc;}

.timeline-highlight-label-start .label_t-highlight1{color:#f00;}
.timeline-highlight-label-end .label_t-highlight1{color:#aaf;}

.timeline-band-events .important{color:#f00;}   
.timeline-band-events .small-important{background:#c00;}

body{
  height:100%;
  width: 100%;
}

#description{
  margin: auto;
  overflow: scroll;
  padding: 1em 0;  
}

#timeline{
  height: 350px;
  width: 100%;
  border: 1px solid #aaa;
}

.timeline-container {
  position: relative;
  font-size: 12px;
}

.timeline-highlight-label {
  position: absolute;
  left: .3em;
  z-index: 1000;
  top: 60px !important;
  text-align: left !important;
  font-size: 18px;
  height: auto !important;
}
.timeline-highlight-label:nth-child(2) {top: 180px !important;}
.timeline-highlight-label:nth-child(3) {top: 270px !important;}


#instructions{
  font-size: 12px;
  line-height: 1.4;
}

</style>
TIMELINE;
getHeader($header,'Timeline Project','resources');?>
<div class="container">
  <div class="row">
    <ul class="breadcrumb">
      <? resourceBreadCrumbs(); ?>
    </ul>
  </div>
  <div class="row">
    <div class="span9">
      <div id="timeline"></div>
    </div>
    <aside id="instructions" class="span3">
      <h5>Instructions</h5>
      <p>Hover over the timeline and scroll using your mouse wheel, touchpad or touchscreen. You may also click on the timeline and use the arrow keys on your keyboard to scroll through the timeline. Click and drag the timeline for more refined control.</p>
      <p>The bottom-most track with the black background displays an overview of all three tracks. In this area, single-date events are represented by a short vertical line while events that span several dates are represented by horizontal bars. Scrolling in this area moves the timeframe in view at a higher speed than scrolling in any of the three tracks.</p>
      <p>The light blue areas between 1860 and 1861 represent weekends.</p>
    </aside>
  </div>
  <div id="description" class="row-fluid tabbable">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#english" data-toggle="tab">English</a></li>
      <li><a href="#italian" data-toggle="tab">Italian</a></li>
    </ul>
    <div class="tab-content span9">
      <article class="tab-pane active" id="english">
        <h4>The Garibaldi Panorama: a timeline</h4>
        <p>Approaching the Garibaldi Panorama as a visual document without having a precise knowledge of the events that constitute Giuseppe Garibaldi’s story means facing a challenge: reconstructing the actual story from the narrated episodes. This challenge is quite demanding: although it seems to constitute a linear presentation of events, the Panorama is in fact a narrative, and therefore a representation that is, to a certain extent, inevitably fictional. The author of the Panorama (who has been identified as J. J. Story) had to make a series of choices and editing decisions in shaping his narrative; such choices need to be understood in relation to two factors in particular: the audience that the panorama was meant to address, and the flow of the news regarding Garibaldi’s deeds, which were reaching England in the very same weeks in which the Panorama was most probably being painted.</p>
        <p>While composing the Garibaldi Panorama, Story’s main preoccupation was to narrate the adventures of its protagonist by mingling the actual facts with the elements of &ldquo;virtual tourism&rdquo; that so much intrigued the audience of panoramas. The historical facts were mainly derived from the contemporary illustrated news and the biographies of Garibaldi circulating at the time (although the latter were quite fictionalized already); the &ldquo;virtual tourism&rdquo; component substituted for classic tourism (the Panorama offered people the possibility to admire Italian landscapes), and also added elements of “war tourism” (the Panorama represented several battles, which greatly excited nineteenth-century audiences).</p>
        <p>The first step we took in undertaking the mapping of the Panorama’s narrative aspects was dividing the Panorama in thematic sections, which deserve to be analyzed separately. During our semester-long project, we decided to focus on the events of the year 1860, which occupy most of Side Two of the Panorama. This period is particularly interesting, since the events represented were essentially unfolding while the Panorama itself was being realized; it is therefore particularly engaging to examine the intertwining between the creation of the Panorama and the publication of the illustrated news that Story used as his main visual sources (many of the images painted by Story are directly derived from the Illustrated London News).</p>
        <p>In order to obtain a chronological visualization of our materials and of the results of our research, we created a timeline to be added to the Garibaldi &amp; the Risorgimento website. Our timeline is composed of three parallel areas that collect in chronological order: 1. The historical events; 2. The ILN articles reporting such events (by clicking on the entry’s title the corresponding illustration appears); 3. The periods of composition and exhibition of the Panorama. The parallel visualization allows the researcher to formulate interesting hypotheses on the timing of the Panorama’s production and on the narrative choices of its author. The timeline we realized is not extensively comprehensive yet, but it shows the valuable potentials of such a tool. It will be possible to insert other articles and publications, such as the biographies of Garibaldi and the travel diaries that inspired Story’s narrative, and to populate the timeline with events and materials relating to other sections of the Panorama. It will also be possible to further exploit the graphic potentials of the software by inserting, for example, color codes that highlight specific connections among the materials (in the area dedicated to publications, for instance, we could distinguish between news, biographies, travel diaries etc. by means of different colors).</p>
        <p>Anna Santucci (Doctoral student in Italian Studies)<br>
        Nicholas Vitrano, '13 (Concentrator in Italian Studies)</p>
      </article>
      <article class="tab-pane" id="italian">
        <h4>Una proposta di "timeline" per il panorama Garibaldi.</h4>
        <p>Chi si relazionasse al panorama come documento visivo senza una conoscenza precisa degli eventi che hanno come protagonista Giuseppe Garibaldi avrebbe notevoli difficoltà a ricostruire gli avvenimenti narrati. Questa difficoltà è dovuta principalmente al fatto che la narrazione apparentemente lineare del panorama è per l’appunto una narrazione. L’autore del panorama, identificato con ogni probabilità con J. J. Story, effettuò una serie di scelte e di montaggi nel dar forma al suo racconto, scelte che vanno analizzate principalmente in relazione a due fattori: il pubblico a cui il panorama era destinato e il flusso delle informazioni sulle imprese di Garibaldi che arrivavano in Inghilterra nelle settimane in cui il panorama veniva presumibilmente dipinto.</p>
        <p>Nella composizione del panorama Garibaldi la principale preoccupazione di Story era narrare le avventure del suo protagonista integrando i fatti, ricavati principalmente dalle biografie di Garibaldi circolanti e dalla stampa illustrata contemporanea, con gli elementi di “turismo virtuale” che attiravano il suo pubblico, sia in termini di turismo classico, cioè vedute di città e paesaggi italiani, sia in termini di “turismo di guerra,” ovvero la rappresentazione delle battaglie stesse, per le quali il pubblico ottocentesco dimostrava grande interesse. </p>
        <p>Per illustrare la composizione narrativa del panorama, ci è sembrato sensato procedere per sezioni tematiche. Per il nostro progetto, abbiamo deciso di concentrarci sugli eventi del 1860, che occupano quasi interamente il secondo lato del panorama. Tale periodo è particolarmente interessante, dal momento che gli episodi rappresentati avvennero sostanzialmente in contemporanea alla creazione del panorama stesso, rendendo ancora più avvincente l’intreccio tra i tempi di realizzazione del panorama e l'utilizzo da parte di Story della stampa illustrata come fonte visiva principale (molte delle immagini dipinte da Story sono infatti direttamente derivate dall’Illustrated London News).</p>
        <p>Per visualizzare cronologicamente i nostri materiali e i risultati della nostra ricerca, abbiamo realizzato una “timeline” che si potesse integrare nel sito Garibaldi &amp; the Risorgimento. La nostra “timeline” è divisa in tre fasce parallele, che indicano in sequenza temporale: 1. i vari eventi storici; 2. le date di pubblicazione dei servizi dell’ ILN ad essi correlate (cliccando sul titolo è possibile visualizzare. l’immagine); 3. i periodi di composizione e esibizione del panorama. Questo tipo di visualizzazione parallela permette di formulare interessanti ipotesi sulle tempistiche di produzione del panorama e sulle scelte narrative del suo autore. La “timeline” che abbiamo realizzato per questo progetto è tutt’altro che esauriente ma mostra almeno i potenziali vantaggi di questo strumenti grafico. In futuro, andrà ulteriormente popolata con gli eventi riguardanti il resto del panorama, e vi si potranno inserire molti altri articoli e pubblicazioni, come ad esempio le biografie di Garibaldi e le testimonianze di viaggiatori da cui Story attinge per la sua narrazione. Sarà inoltre possibile sfruttare maggiormente le possibilità grafiche del software, inserendo ad esempio codici di colori per evidenziare determinate associazioni tra i materiali (nella fascia dedicata alle pubblicazioni, si potrebbe distinguere con diversi colori i vari giornali, o le biografie, i resoconti di viaggio e via dicendo). </p>
        <p>Anna Santucci (Doctoral student in Italian Studies)<br>Nicholas Vitrano, '13 (Concentrator in Italian Studies)</p>
      </article>
    </div>
  </div>
</div>
<script>
  var tl
    , resizeTimerID = null;

  $(document).ready(function(e){
     
    var eventSource1 = new Timeline.DefaultEventSource()
      , eventSource2 = new Timeline.DefaultEventSource()
      , eventSource3 = new Timeline.DefaultEventSource()
      , eventAll =  new Timeline.DefaultEventSource();
// TODOs: make tracks more even and further from top
//lines for hotzones
// 3rd track last event problem
// wordwrap for titles
// track titles
// hide time display on bubble

    var theme = Timeline.ClassicTheme.create();
      //  Timeline.ThemeName = 'dark-theme'
      //  theme.timeline_start = new Date(Date.UTC(1840,0,1))
      //  theme.timeline_end = new Date(Date.UTC(1880,0,1))
            
    theme.event.bubble.width = 400;
    theme.event.track.height = 10;
    theme.event.track.gap = 3;
    theme.event.track.offset = 3;
    theme.event.label.offsetFromLine = 5;
    theme.event.tape.height = 5;
    
    var bandInfos = [
        Timeline.createHotZoneBandInfo({
           zones: [
               {   start:    "1860-05-01",
                   end:      "1861-05-31",
                   magnify:  40,
                   unit:     Timeline.DateTime.WEEK
               },
           ],
            width:          "28%", 
            intervalUnit:   Timeline.DateTime.YEAR, 
            eventSource:    eventSource1,
            intervalPixels: 200,
            theme:          theme,
            date:           "1849-01-01",
        }),
        Timeline.createHotZoneBandInfo({
           zones: [
               {   start:    "1860-05-01",
                   end:      "1861-05-31",
                   magnify:  40,
                   unit:     Timeline.DateTime.WEEK
               },
           ],
            width:          "34%", 
            intervalUnit:   Timeline.DateTime.YEAR, 
            eventSource:    eventSource2,
            intervalPixels: 200,
            theme:          theme,
            date:           "1849-01-01",
        }),
        Timeline.createHotZoneBandInfo({
           zones: [
               {   start:    "1860-05-01",
                   end:      "1861-05-31",
                   magnify:  40,
                   unit:     Timeline.DateTime.WEEK
               },
           ],
            width:          "24%", 
            intervalUnit:   Timeline.DateTime.YEAR, 
            eventSource:    eventSource3,
            intervalPixels: 200,
            theme:          theme,
            date:           "1849-01-01",
        }),
        Timeline.createHotZoneBandInfo({
           zones: [
               {   start:    "1860-05-01",
                   end:      "1861-05-01",
                   magnify:  30,
                   unit:     Timeline.DateTime.MONTH
               },
           ],
            width:          "14%", 
            intervalUnit:   Timeline.DateTime.DECADE, 
            eventSource:    eventAll,
            theme:          theme,
            date:           "1849-01-01",
            layout:         'overview',
            intervalPixels: 400,
        })
    ];
    bandInfos[1].syncWith = 0;
    bandInfos[2].syncWith = 0;
    bandInfos[3].syncWith = 0;
    bandInfos[3].highlight = true;
  //  bandInfos[1].eventPainter.setLayout(bandInfos[0].eventPainter.getLayout());
 

    bandInfos[0].decorators = [
        new Timeline.SpanHighlightDecorator({
            startDate:  "1849-01-01",
            endDate:    "1862-01-01",
           // color:      "#FFC080", // set color explicitly
            opacity:    0,
            startLabel: "Events",
            theme:      theme
        })
    ];
    bandInfos[1].decorators = [
        new Timeline.SpanHighlightDecorator({
            startDate:  "1849-01-01",
            endDate:    "1862-01-01",
           // color:      "#FFC080", // set color explicitly
            opacity:    0,
            startLabel: "News",
            theme:      theme
        })
    ];
    bandInfos[2].decorators = [
        new Timeline.SpanHighlightDecorator({
            startDate:  "1848-01-01",
            endDate:    "1862-01-01",
           // color:      "#FFC080", // set color explicitly
            opacity:    0,
            startLabel: "Panorama",
            theme:      theme
        })
    ];
  
    tl = Timeline.create(document.getElementById("timeline"), bandInfos);
    tl.loadJSON("./groupings1.json", function(json, url) {
       eventSource1.loadJSON(json, url);
       eventAll.addMany(eventSource1.getAllEventIterator()._events._a);
     });
     tl.loadJSON("./groupings2.json", function(json, url) {
       eventSource2.loadJSON(json, url);
       eventAll.addMany(eventSource2.getAllEventIterator()._events._a);
     });
     tl.loadJSON("./groupings3.json", function(json, url) {
       eventSource3.loadJSON(json, url);
        eventAll.addMany(eventSource3.getAllEventIterator()._events._a);
     });


     $('#timeline').prepend($('.timeline-highlight-label-start').css('right',0));
  });
  $(document).resize(function(e){
    if (resizeTimerID == null) {
      resizeTimerID = window.setTimeout(function() {
          resizeTimerID = null;
          tl.layout();
      }, 500);
    }
  })
</script>
<noscript>Javascript must be enabled to view this timeline.</noscript>
<?footer()?>
</body>
</html>
