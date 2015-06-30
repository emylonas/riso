<?php

session_start();
$_SESSION['colid'] = 38;
include('dependencies/functions.php');
$css = '';
getHeader($css,"Behind the Scenes")?>
<div class="container">
    <div class="tabbable" style="margin-top:10px;">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#project" data-toggle="tab">The Project</a></li>
            <li><a href="#about" data-toggle="tab">About the Panorama</a></li>
            <li><a href="#digitize" data-toggle="tab">The Digitization Process</a></li>
            <li><a href="#ads" data-toggle="tab">Panorama Advertisements</a></li>
            <li><a href="#team" data-toggle="tab">Research Team</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="project"><!--Project-->
                <!--#-->
                <div class="row">
                    <div class="span8">
                        <h4>The Project</h4>
                        <p style="text-align:justify">Measuring 4.75 feet tall and 260 feet wide,
                            painted on paper on each side, the Garibaldi panorama is an
                            extraordinary multimedia hybrid: part graphic novel, part illustrated
                            history, part forerunner of cinema, it is a sort of archeological
                            specimen in which, embedded in a now-vanished form of popular culture,
                            we find the traces of a dawning information society, an example of how
                            news and entertainment were already mixed together in the 19th century,
                            as they are in today's 'infotainment' society. Through its visual
                            narrative, the panorama transports us back 150 years, to the summer and
                            fall of 1860, when British Garibaldimania was at its height and a
                            popular hero was 'imagined' and 'invented' in the media of his times. </p>
                        <p style="text-align:justify">The panorama's dimensions and its fragility
                            make it impossible for scholars to study and explore it with ease and
                            without fear of damage. In 2007, with financial support from the
                            Department of Italian Studies and Vincent J. Buonanno (Brown '66), the
                            library digitized the panorama, and we are pleased to be able to offer
                            this amazing treasure to the world, part of a site that, we hope, will
                            contribute to recounting a largely untold story about this popular
                            medium and Garibaldi's popularity in the Europe and the United States of
                            his times. </p>
                        <p style="text-align:justify">Over the past five years, the project has
                            significantly evolved, thank to the generous support of the Brown
                            University librarian (Harriette Hemmasi), the Brown vice-President for
                            Research and a fellowship and grant awarded to the project coordinator,
                            Prof. Massimo Riva, by the American Council for Learned Societies. Users
                            can now view the panorama as a scrolling image and zoom in and out on
                            specific scenes; they are able to listen to a voiceover narration, in
                            both English and Italian, adapted from the manuscript acquired with the
                            panorama, and they can read the manuscript and its full transcription,
                            side by side. Accompanying the animation is a collection of digital
                            documents from the Brown library and the Harvard Risorgimento
                            collections: portraits, pamphlets, articles and prints from illustrated
                            newspapers that feature either Garibaldi or significant moments in the
                            movement for Italian Unification. Additionally, relevant materials from
                            the Anne S.K. Brown Military Collection have been gathered for study and
                            digitization. </p>
                        <p style="text-align:justify">An international team of scholars from a
                            variety of fields, ranging from history and art history to literary and
                            media studies, is at work on augmenting this digital archive. In years
                            to come, these scholars will contribute essays about the history of the
                            Risorgimento and about the panorama as an artifact; its historical
                            context; the history of its exhibitions; as well as general information
                            about panoramas and dioramas as 'optical devices' and popular
                            representational media in 19th-century Europe. Furthermore, the panorama
                            has been the object of another interdisciplinary experiment with the
                            Microsoft Surface: high definition images of the panorama and a select
                            number of the associated digital documents were incorporated into LADS,
                            a museum display system developed under the supervision of Brown
                            computer scientist Andries van Dam. LADS (now further developed into
                            TAG, Touch Art Gallery) utilizes Microsoft Deep Zoom technology on a
                            Windows 7 (now 8) platform to create a digital exhibition of large-scale
                            artworks such as the Garibaldi panorama. The result of this work was the
                            subject of several exhibitions in the U.K. and Italy in 2010-12,
                            supported by Microsoft Research and the Brown library as well as various
                            local institutions, namely: an installation at the British Library, as
                            part of the exhibit "Growing Knowledge," October 2010-May 2011; an
                            installation in the Sala del Risorgimento of the Palazzo Pubblico in
                            Siena, October 2011-January 2012; and a third installation entitled
                            "Storia da toccare," [History to touch], in the atrium of the Bologna
                            Salaborsa (the city's public library and community center) during the
                            month of November, 2011. </p>
                    </div>
                    <div class="span3 pull-right well">
                        <p><strong>Related Projects</strong></p>
                        <a href="http://www.brown.edu/Departments/Italian_Studies/vhl_new/">
                            <p>Virtual Humanities Lab</p></a>
                        <a href="http://www.brown.edu/Departments/Italian_Studies/">
                            <p>Brown University Italian Studies Department</p></a>
                        <a href="http://library.brown.edu/cds/">
                            <p>Center for Digital Scholarship</p></a>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="about">
                <br/>
                <div class="row">
                    <div class="span8">
                        <h4>About the Panorama</h4>
                        <p style="text-align:justify">The Garibaldi panorama was created in 1860,
                            and acquired by the Brown University Library in 2005. Its author is most
                            likely John James Story, a minor landscape and panorama painter and
                            impresario native to Nottingham, in the U.K. The Garibaldi panorama
                            belongs to the typology of 'moving' panoramas. While the majority of
                            panoramas were large, fixed paintings viewed from a central platform,
                            smaller 'moving' panoramas were created to meet a need for smaller
                            audiences. Whereas the large stationary pieces were completely exposed
                            from beginning to end, the 'moving' panoramas displayed one scene at a
                            time. Attached to rollers, the paintings could be unrolled slowly as a
                            narrator described each vignette to the audience, often with musical
                            accompaniment [see<a href="resources/sheetmusic.php" target="_blank">
                                Sheet Music</a>]. The manuscript acquired by the library with the
                            panorama contains the script used by the narrator
                            <!-- [see Read the Manuscript] -->. Markers on the paintings would serve
                            as guides for the persons cranking the piece (one can notice such red
                            markers on the bottom edge of the panorama). An interval would have been
                            announced upon reaching the end of side one, in order for the staff to
                            turn the panorama around for displaying the second side.</p>
                        <p style="text-align:justify">The moving panorama depicting the life and
                            deeds of Garibaldi is an example of the use of a popular subject for
                            commercial entertainment. When the panorama was first exhibited (in
                            Derby, on December 26-27, 1860, and Nottingham, on February 19 and 20,
                            1861‚ see the ads for these performances), Giuseppe Garibaldi was the
                            man of the moment. His portrait--as well as his achievements during his
                            famous expedition to Sicily, aimed at unifying the North and the South
                            of Italy--graced the pages of the illustrated newspapers, and the
                            educated classes would have been very familiar with his exploits [see:
                                <a href="resources/illustrated_press.php" target="_blank">Garibaldi
                                and the Illustrated Press</a>]. The news, as well as popular
                            biographical accounts of Garibaldi's accomplishments, provided Story
                            with abundant textual and visual sources [these sources can now be
                            explored in the section Research the Panorama]. A linear painting
                            portraying these events in action-packed vivid color, in 49 scenes or
                            sections, would have been hugely popular. Wars were particularly
                            appealing subjects for panorama painters, and the contemporary
                            Risorgimento events in Italy offered more than their fair share of
                            combat, action, and drama. It would have guaranteed a ready audience in
                            England eager to fork over a shilling or two to spend an hour being
                            enthralled by the escapades of the Italian patriot, in words and
                            pictures.</p>
                        <p style="text-align:justify">While its commercial goals seem undeniable,
                            scholars are also exploring interesting hypotheses on the Panorama's
                            role as propaganda (Garibaldi enjoyed a triumphal welcome in London in
                            1864). Although the Brown panorama is the only surviving exemplar of its
                            kind, we know of several other Garibaldi panoramas circulating in
                            England in that period (see the article by <a
                                href="resources/scholarship/Sutcliffe/Hamilton_Sutcliffe.html"
                                target="_blank">Marcella Sutcliffe, - Other Garibaldi panoramas and
                                dioramas: Gompertz and Hamilton</a>). </p>
                        <p style="text-align:justify">The manuscript accompanying the panorama ends
                            with scene 49 which depicts the triumphal entry of Garibaldi and the
                            King of Sardinia, Victor Emmanuel, into Naples, after the victorious
                            battle of Volturno against the Bourbons (on March 18, 1861, Victor
                            Emmanuel was crowned the first King of Italy). However, the panorama as
                            we inherited it includes six additional scenes, four of which are
                            related to the battle of Aspromonte (August 2, 1862), in which Garibaldi
                            was famously wounded in the leg. These scenes provide the evidence that
                            the artist, John James Story, updated his piece to reflect the latest
                            news. </p>
                        <p style="text-align:justify">How did the panorama arrive in America? In
                            1862, Anthony Burford, a member of the Cotswold family, who had
                            emigrated to the United States in 1854, returned to Great Britain on a
                            visit. He found this panorama in Nottingham and was able to purchase it
                            from the artist (see the announcement by Story advertising the panorama
                            for sale, published in The Era). After purchasing it, Mr. Burford
                            brought the panorama back to the United States and attempted to show it,
                            with little success. It was put into storage by his daughter-in-law
                            Clarissa, wife of Robert Burford, and eventually inherited by Grace
                            Burford, an active member of the International Panorama Diorama Society.
                            She, in turn, gave it to her nephew, Dr. James Smith, in about 1980. In
                            October 2005, Dr. Smith donated the panorama to the Brown University
                            Library, where it resides as part of the Anne S.K. Brown Military
                            Collection. </p>
                    </div>
                    <div class="span3 pull-right well">
                       
                            <!-- http://www.uic.edu/depts/accc/itl/realmedia/code/embed_quicktime.html -->
							<object CLASSID="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" width="220" height="176" CODEBASE="http://www.apple.com/qtactivex/qtplugin.cab">
							<param name="src" value="rtsp://dl.lib.brown.edu:554/movies/garibaldi/panorama.mov">
							<param name="qtsrc" value="rtsp://dl.lib.brown.edu:554/movies/garibaldi/panorama.mov">
							<param name="autoplay" value="true">
							<param name="loop" value="false">
							<param name="controller" value="true">
							<embed src="sample.mov" qtsrc="rtsp://dl.lib.brown.edu:554/movies/garibaldi/panorama.mov" width="220" height="176" autoplay="true" loop="false" controller="true" pluginspage="http://www.apple.com/quicktime/"></embed>
							</object>
                        
                       
                            <p style="text-align:justify;">In 2005, Dr. Smith produced a video
                                documentary on the Garibaldi Panorama. While some of the
                                attributions made in the video are potentially incorrect, the video
                                does provide an engrossing overview of the panorama. This
                                documentary runs just under 50 minutes in length.</p>
                            <p style="text-align:justify; border-top:2px;">Dr. Smith published this brochure to
                                accompany the panorama and video documentary.</p>
                            <p class='text-center'>
                                <img src="img/brochurebook.jpg" alt="Image of the Brochure book"
                                    class="img-rounded"/></p>
                             <p class='text-center'>       
                                <a class="btn"
                                    href="http://library.brown.edu/find/Record/dc1190723990328125"
                                    >View the Brochure</a></p>
                    </div>
                    </div>
                    <br/>
                </div><!--end about tab-->
    
    <div class="tab-pane" id="digitize"><!--Digitization Process-->
        <div class="row">
            <div class="span8" style="text-align:justify">
                <h4>Digitization Overview</h4>
                <p>The sheer dimensions of the Garibaldi panorama—4.75' tall and 260' wide on each
                    side—presented unique digitization challenges. Boston Photo Imaging, a
                    professional digital imaging company, was contracted to capture digital images
                    of the panorama as it was unrolled across a custom-built wooden platform. Using
                    a vertically mounted Better Light 4" x 5" digital scan back, capturing both
                    sides of the panorama took three days and resulted in 91 digital image files,
                    each file ~244 MB and representing ~6.5' of horizontal width (including on
                    average .5-1' of overlap, in order to facilitate subsequent image merging). The
                    scan back captured 300 dpi RGB TIF files; given the height of the device this
                    resulted in an effective real-world resolution of ~137 dpi at the actual size of
                    the panorama.</p>
                <p>Because scenes within the panorama’s visual narrative do not correspond to the
                    uniform width used in the capture process, sets of capture files were digitally
                    merged together five at a time by the Brown Library's Center for Digital
                    Initiatives staff, at full capture resolution within Photoshop CS3/v10, and then
                    individual scenes were isolated and saved from these roughly 30-feet merged
                    sections. A continuous image of each side of the panorama was produced by
                    subsequently merging sequences of these five-section composites at a reduced
                    resolution. As part of this process the plastic-over-board background initially
                    visible along the top and bottom edges was digitally removed, and each merged
                    group of five was slightly rotated in order to compensate for some inevitable
                    alignment drift produced during the unrolling process. Tonal levels and
                    saturation values were slightly adjusted, and files were moderately sharpened
                    for full-resolution and reduced-resolution delivery sizes.</p>
            </div>
            <div class="span8">
                <ul class="thumbnails">
                    <li class="span3 offset1">
                        <a class="fancybox-button thumbnail" rel="fancybox-button"
                            href="./img/digitization2.jpeg" title="Digitization Process 1">
                            <img src="./img/digitization2.jpeg" alt=""/>
                        </a>
                    </li>
                    <li class="span3 offset1">
                        <a class="fancybox-button thumbnail" rel="fancybox-button"
                            href="./img/digitization_main.jpg" title="Digitization Process 2">
                            <img src="./img/digitization_main.jpg" alt=""/>
                        </a>
                    </li>
                    <li class="span3 offset1">
                        <a class="fancybox-button thumbnail" rel="fancybox-button"
                            href="./img/digitization3.jpeg" title="Digitization Process 3">
                            <img src="./img/digitization3.jpeg" alt=""/>
                        </a>
                    </li>
                    <li class="span3 offset1">
                        <a class="fancybox-button thumbnail" rel="fancybox-button"
                            href="./img/digitization4.jpeg" title="Digitization Process 4">
                            <img src="./img/digitization4.jpeg" alt=""/>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="span8">
                <h4>Preservation Concerns During the Capture Process</h4>
                <p>As a result of the panorama&rsquo;s past use, there are many tears in the paper,
                    particularly at the top and bottom edges (as viewed) and at the leading edge of
                    the giant scroll. There is evidence of many past repairs, from delicate Japanese
                    paper repairs to heavier paper repairs painted to match the original
                    watercolors, as well as pressure sensitive document repair tape and a great deal
                    of hand-stitching along the leading edge. The top and bottom edges were once
                    lined with canvas, but it is now missing on the bottom and only partially
                    attached along the top edge.</p>
                <p>The images consist of watercolors on paper &mdash; particularly fragile and
                    susceptible to oils from human skin, not to mention damage from rough handling
                    and exposure to light. The pigment layers are similar to gouache, opaque and
                    thick, sitting on the surface of the paper and vulnerable to smudging as a
                    result of abrasion, or to flaking as the paper substrate is flexed.</p>
                <p>Preservation Department staff members reviewed the digital capture equipment
                    configuration and discussed the process with the technicians, and determined
                    that the best way to ensure safe handling of the panorama was to personally
                    unroll and re-roll it as images were captured. The large dimensions and fragile
                    nature of the nearly 150-year-old object required skilled, gentle, and
                    experienced hands.</p>
                <p>The panorama was unrolled across a wooden platform specifically constructed for
                    this project; the platform was covered in plastic sheeting to provide a clean,
                    smooth surface across which the panorama could glide. The plastic also minimized
                    the likelihood of frayed edges and small tears snagging on the wood. Cotton
                    gloves were required for anyone handling the panorama directly, reducing the
                    amount of dirt and oil transferred to the paper.</p>
            </div>
            <div class="span8">
                <h4>Long-term Preservation Needs</h4>
                <p>The panorama came to Brown wrapped in a wool blanket and tied with ropes. The
                    drums around which it is rolled are made of wood and board wrapped in heavy
                    paper &mdash; sources of acid and other volatile organic compounds that lead to
                    the deterioration of paper and pigments. To improve the panorama&rsquo;s storage
                    conditions, the paper was removed from the drums and replaced with thicker
                    acid-free, lignin-free paper adhered with polyvinyl acetate adhesive and
                    acid-free double-sided tape. The panorama was rolled as carefully as possible to
                    minimize cockling or folds and wrapped with a layer of acid-free tissue and then
                    with sheets of the same heavy paper now lining the drum to minimize any exposure
                    to light. These sheets were secured with several paper belts.</p>
                <p>The paper itself is of good quality and is in good shape throughout most of the
                    panorama, except in specific areas. These include a section along one edge with
                    an unidentified stain that is very brittle and flaking apart, and both ends of
                    the scroll, which are especially worn and have some large tears. These would
                    need to be repaired if the panorama were to be handled or displayed on a more
                    regular basis. Our current working assumption is that the availability of a
                    digital surrogate will decrease the demand for in-person viewing to the point
                    where the safe storage of the panorama in our climate-controlled Library
                    Collections Annex is adequate protection and will preserve this object well into
                    the future. </p>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="ads"><!--Video-->
        <div class="row">
            <div class="span8">
                <h3>Panorama Advertisements</h3>
                <ul class="thumbnails">
                    <li class="span3 offset1"><a class="fancybox-button thumbnail" rel="adgroup"
                            href="img/ads/panorama_ad.jpg" target="_blank"><img
                                src="img/ads/panorama_ad.jpg" alt=""/><br/><br/><p
                                style="text-align:center;">Panorama Advertisement</p></a></li>
                    <li class="span3 offset1"><a class="fancybox-button thumbnail" rel="adgroup"
                            href="img/ads/Gompertz_ad.gif" target="_blank"><img
                                src="img/ads/Gompertz_ad.gif" alt=""/><br/><br/><p
                                style="text-align:center;">Gompertz Advertisement</p></a></li>
                    <li class="span3 offset1"><a class="fancybox-button thumbnail" rel="adgroup"
                            href="img/ads/Gompertz_ad2.jpg" target="_blank"><img
                                src="img/ads/Gompertz_ad2.jpg" alt=""/><p style="text-align:center;"
                                >Another Gompertz Advertisement</p></a></li>
                    <li class="span3 offset1"><a class="fancybox-button thumbnail" rel="adgroup"
                            href="img/ads/Bianco_Gar.jpg" target="_blank"><img
                                src="img/ads/Bianco_Gar.jpg" alt=""/><br/><br/><p
                                style="text-align:center;">Bianco Advertisement</p></a></li>
                    <li class="span3 offset1"><a class="fancybox-button thumbnail" rel="adgroup"
                            href="img/ads/Nottingham_ad_detail.jpg" target="_blank"><img
                                src="img/ads/Nottingham_ad_detail.jpg" alt=""/><br/><br/><p
                                style="text-align:center;">Nottingham Advertisement</p></a></li>
                </ul>
                <h3>The Moving Diorama at The Exchange Hall</h3>
                <blockquote style="margin-right:10px;text-align:justify">
                    <p>-Last (Monday) evening M. Bianco's magnificent dioramic views of the life of
                        Garibaldi were exhibited to a large and admiring audience at the Exchange
                        Hall. The exhibition, which is certainly of a first-class character,
                        commences from the youth of the Italian Liberator, and continues stage after
                        stage up to the battle of Volturno. It consists in two large sections of
                        views taken from drawings made at the respective scenes of action. It is the
                        work of skilful and eminent artists, and depicts with great fidelity the
                        many startling and marvellous circumstances connected with the glorious
                        career of the "Hermit of Caprera." The most striking of the numerous scenes
                        presented to the notice of the assembled spectators were the last of each
                        section, namely, "The death of the devoted Annita, the beloved partner of
                        Garibaldi;" and "The triumphal entry of Victor Emmanuel and Garibaldi into
                        Naples." Messrs. Richardson and Woolley conducted the musical part of the
                        entertainment in an admirable manner. We see by advertisement in another
                        column that the diorama will continue to be exhibited in Nottingham this day
                        and to-morrow, and we sincerely trust that the deserving proprietor of such
                        an interesting and highly successful exhibition will reap meet rewards for
                        the skill and industry displayed in the highly-finished and most interesting
                        views which he presents to the public.</p>
                    <small><cite>NOTTINGHAM DAILY EXPRESS FEBRUARY 19, 1861</cite></small>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="team"><!--Research Team-->
        <div class="row">
            <div class="span10 pull-left">
                <table class="table table-condensed" style="border-top:none;">
                    <tbody>
                        <thead>
                            <tr>
                                <th style="padding-top:10px;padding-bottom:10px;"><h4>Project
                                        Coordinator</h4></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Prof. Massimo Riva</td>
                            <td>Italian Studies, Brown University, project coordinator</td>
                        </tr>
                        <thead>
                            <tr>
                                <th style="padding-top:10px;padding-bottom:10px;"><h4>International
                                        Advisory Board</h4></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Prof. Angela De Benedictis</td>
                            <td>University of Bologna, Italy</td>
                        </tr>
                        <tr>
                            <td>Prof. John Davis</td>
                            <td> University of Connecticut, Storrs</td>
                        </tr>
                        <tr>
                            <td>Prof. David I. Kertzer</td>
                            <td>Anthropology and Italian Studies, Brown University</td>
                        </tr>
                        <tr>
                            <td>Prof. Dietrich Neumann</td>
                            <td>Professor of History of Art and Architecture, Brown University</td>
                        </tr>
                        <tr>
                            <td>Prof. Gilles Pécout</td>
                            <td>Université Sorbonne and École Normale Supérieure, Paris, France</td>
                        </tr>
                        <tr>
                            <td>Prof. Lucy Riall</td>
                            <td>University of London, UK</td>
                        </tr>
                        <thead>
                            <tr>
                                <th style="padding-top:10px;padding-bottom:10px;"><h4>Contributing
                                        Scholars</h4></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Dr. Benedetta Gennaro</td>
                            <td>Goethe University, Frankfurt, Germany</td>
                        </tr>
                        <tr>
                            <td>Dr. Maria Pia Casalena</td>
                            <td>University of Bologna, Italy</td>
                        </tr>
                        <tr>
                            <td>Dr. Gian Luca Fruci</td>
                            <td>University of Pisa, Italy</td>
                        </tr>
                        <tr>
                            <td>Mr. Peter Harrington</td>
                            <td>University Library, Brown University</td>
                        </tr>
                        <tr>
                            <td>Prof. Dian Kriz</td>
                            <td>History of Art and Architecture, Brown University</td>
                        </tr>
                        <tr>
                            <td>Dr. Giovanna Lasi </td>
                            <td>University of Bologna, Italy</td>
                        </tr>
                        <tr>
                            <td>Dr. Clizia Magoni </td>
                            <td>University of Bologna, Italy</td>
                        </tr>
                        <tr>
                            <td>Dr. Giacomo Manzoli </td>
                            <td>University of Bologna, Italy</td>
                        </tr>
                        <tr>
                            <td>Erica Moretti </td>
                            <td>Mt. Holyoke College</td>
                        </tr>
                        <tr>
                            <td>Dr. Alessio Petrizzo</td>
                            <td>University of Pisa, Italy</td>
                        </tr>
                        <tr>
                            <td>Dr. Simon Sarlin</td>
                            <td>École Française, Rome</td>
                        </tr>
                        <tr>
                            <td>Dr. Marcella Sutcliffe</td>
                            <td>University of Newcastle, UK</td>
                        </tr>
                        <thead>
                            <tr>
                                <th style="padding-top:10px;padding-bottom:10px;"
                                    ><h3>Technical</h3></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>John Melson</td>
                            <td>WWP, Brown University</td>
                        </tr>
                        <tr>
                            <td>Elli Mylonas</td>
                            <td>CDS, Brown University</td>
                        </tr>
                        <thead>
                            <tr>
                                <th style="padding-top:10px;padding-bottom:10px;"
                                        ><h3>Associates</h3></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Nicole Gercke</td>
                            <td>Italian Studies, Brown University</td>
                        </tr>
                        <tr>
                            <td>Stephen Marth</td>
                            <td>Italian Studies, Brown University</td>
                        </tr>
                        <tr>
                            <td>Michela Ronzani</td>
                            <td>Italian Studies, Brown University</td>
                        </tr>
                        <tr>
                            <td>Giovanna Roz</td>
                            <td>Italian Studies, Brown University</td>
                        </tr>
                        <tr>
                            <td>Anna Santucci</td>
                            <td>Italian Studies, Brown University</td>
                        </tr>
                        <tr>
                            <td>Xavier Sawada</td>
                            <td>Brown University '13</td>
                        </tr>
                        <tr>
                            <td>Arlando Battle</td>
                            <td>Brown University '12</td>
                        </tr>
                        <tr>
                            <td>Joel Kang</td>
                            <td>Brown University '13</td>
                        </tr>


                    </tbody>
                </table>
                <br/><br/>
            </div>
        </div>
    </div><!--end tab5-->
</div>
  					<!--####-->
			
				<!--The Team-->
				
				</div>
			</div><!--end container-->
			<br /><br /><br />
		</div><!--end row-->
		
		</div>
		


		<?footer()?>
		<!-- for image thumbnails in fancybox -->
		<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
		<link rel="stylesheet" type="text/css" src="js/jquery.fancybox.css">
		<link rel="stylesheet" type="text/css" src="js/jquery.fancybox-buttons.css">
		<script type="text/javascript" src="js/jquery.fancybox-buttons.js"></script>
	
<!--script for slide counter in the about page
        <script src='js/swipe.min.js'></script>
5Mar2013 Joel: There seems to be no slider anymore

<script type="text/javascript">
// slider
var slider = new Swipe(document.getElementById('about-slider'), {
        callback: function(e, pos) {
        
        var i = bullets.length;
        while (i--) {
          bullets[i].className = ' ';
        }
        bullets[pos].className = 'on';

      }
    }),
    bullets = document.getElementById('position').getElementsByTagName('em');
</script>
-->
</script>
</body>
</html>
	
