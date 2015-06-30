<?php

$pages = json_decode(file_get_contents("../../datafiles/pages.json"));

foreach($pages as $index=>$page){
echo"url=\"http://tuvok.services.brown.edu/adore-djatoka/resolver?url_ver=Z39.88-2004&rft_id=http://tuvok.services.brown.edu/adore-djatoka/jp2/$page.jp2&svc_id=info:lanl-repo/svc/getRegion&svc_val_fmt=info:ofi/fmt:kev:mtx:jpeg2000&svc.format=image/jpeg&svc.level=3\"<br>output=\"page-$index.jpg\"<br>";
}

?>
