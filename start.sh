export QT_QPA_PLATFORM=offscreen
/usr/bin/phantomjs --cookies-file=/usr/local/src/parser/cookies.txt --ignore-ssl-errors=true --load-images=false --ssl-protocol=any /usr/local/src/parser/login.js
sleep 180
/usr/bin/php /usr/local/src/parser/parser.php
