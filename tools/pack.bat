packer.exe -o ../lib/js/qrcanvas.packed.tmp.js ../lib/js/qrcanvas.js
tail.exe -1 < ../lib/js/qrcanvas.packed.tmp.js > ../lib/js/qrcanvas.packed.tmp2.js
cat.exe qrcanvas_header.txt > ../lib/js/qrcanvas.packed.js
cat.exe ../lib/js/qrcanvas.packed.tmp2.js >> ../lib/js/qrcanvas.packed.js

cd ../lib/js/
del qrcanvas.packed.tmp.js
del qrcanvas.packed.tmp2.js

pause