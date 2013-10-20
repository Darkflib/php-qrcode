/*
 * PHP QR Code encoder
 *
 * QR Code CANVAS support
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

function QRdiffCharDecode(str) {
	if (str == '0') {
		return 0;
	} else {
		var updchar = str.toUpperCase();
		var multi = 1;
		if (str == updchar)
			multi = -1;
		var delta = updchar.charCodeAt(0)-64;
		
		return delta*multi;
	}
}

function QRdecompactOps(str) {
	var ops = new Array();
	var strTab = str.split(',');
	
	while (strTab.length > 0) {
	
		var code = strTab.shift();
		var rcode = code.toUpperCase();
		
		switch (rcode) {
			case 'P':
			case 'R':
					if (code == rcode) {
						ops.push('S');
					} else {
						ops.push('W');
					}
		
					ops.push(rcode);
					
					var points = strTab.shift();
					var plen = points.length;
					
					for (var i=0;i<plen;i++) {
					
						var ccode = 0;
						var fchar = points.charAt(i);
						if (fchar == 'z') { ccode += 60; i++; } else
						if (fchar == 'Z') { ccode += 120; i++; } else
						if (fchar == '+') { ccode += 180; i++; };

						var n = points.charCodeAt(i);
						
						if (n >= 97) { ccode += ((n - 97) + 10);} else
						if (n >= 65 ) { ccode += ((n - 65) + 35); } else
						if (n >= 48) { ccode += (n - 48); }
						
						ops.push(ccode+'');
					}
				break;
			case 'B':
					
					var count = parseInt(strTab.shift());
					
					for (var no = 0; no < count; no++) {
						if (code == rcode) {
							ops.push('S');
						} else {
							ops.push('W');
						}
			
						ops.push('B');
						ops.push('M');
					
						var px = parseInt(strTab.shift());
						var py = parseInt(strTab.shift());
						
						ops.push(px+'');
						ops.push(py+'');
						
						ops.push('T');
						
						var points = strTab.shift();
						
						points = points.split('1').join('00')
						.split('2').join('aa').split('3').join('aA')
						.split('4').join('Aa').split('5').join('AA')
						.split('6').join('aB').split('7').join('Ab')
						.split('8').join('bA').split('9').join('Ba');
						
						var plen = points.length;
						
						for (var i=0;i<plen;i+=2) {
							px += QRdiffCharDecode(points.charAt(i));
							py += QRdiffCharDecode(points.charAt(i+1));
							
							ops.push(px+'');
							ops.push(py+'');
						}
						
						ops.push('E');
					}
				break;
			case 'O':
					for (i=0;i<3;i++) {
						var px = parseInt(strTab.shift());
						var py = parseInt(strTab.shift());
						
						ops.push('S,R');
						ops.push(px);
						ops.push(py);
						ops.push('7,7,W,R');
						ops.push(px+1);
						ops.push(py+1);
						ops.push('5,5,S,R');
						ops.push(px+2);
						ops.push(py+2);
						ops.push('3,3');
						
					}
				break;
		}
	
	}
	
	return ops.join(',');
}


function QRdrawCode(ops, elemId, w, maxx, maxy, xbord, ybord) {
	
	var canvas = document.getElementById(elemId);
	
	if (!xbord)
		xbord = 2;
		
	if (!ybord)
		ybord = 2;
		
	if (!maxx)
		maxx = canvas.clientWidth;
	
	if (!maxy)
		maxy = canvas.clientHeight;	
	
	var scalex = parseInt(maxx/(w+(xbord*2)));
	var scaley = parseInt(maxy/(w+(ybord*2)));

	if (scalex < 1)
		scalex = 1;

	if (scaley < 1)
		scaley = 1;
		
	var scalexy = Math.min(scalex, scaley);

	var diffx = maxx - ((w+(xbord*2))*scalexy);
	var diffy = maxy - ((w+(ybord*2))*scalexy);

	var offx = scalexy*xbord + parseInt(diffx/2.0);
	var offy = scalexy*ybord + parseInt(diffy/2.0);
	
	var opEx = ops.split(',');
	var opExLen = opEx.length;
	var opExPos = 0;
	
	if (canvas.getContext) {
		
		var ctx = canvas.getContext('2d');
		var func = opEx[opExPos];
		var lastFunc = '';
		
		ctx.fillStyle = "white";
		ctx.fillRect(offx,offy, w*scalexy, w*scalexy);
		
		while (opExPos < opExLen) {
		
			var fetchOp = true;
		
			switch (func) {
			
				case 'S' : // black fill
						ctx.fillStyle = "black";
					break;
					
				case 'W' : // white fill
						ctx.fillStyle = "white";
					break;
					
				case 'B' : // begin of path
						ctx.beginPath();
					break;
				case 'M' : // move pen
					
						opExPos++;
						var px = opEx[opExPos];
						opExPos++;
						var py = opEx[opExPos];
						ctx.moveTo(px*scalexy+offx,py*scalexy+offy);
					break;
				case 'T' : // line to
						opExPos++;
						var px = opEx[opExPos];
						opExPos++;
						var py = opEx[opExPos];
						ctx.lineTo(px*scalexy+offx,py*scalexy+offy);
					break;
				case 'E' : // end of path
						ctx.fill();
					break;
				case 'P' : // single point
						opExPos++;
						var px = opEx[opExPos];
						opExPos++;
						var py = opEx[opExPos];
						ctx.fillRect(px*scalexy+offx,py*scalexy+offy, scalexy, scalexy);
					break;					
				case 'R' : // rectangle
						opExPos++;
						var px = opEx[opExPos];
						opExPos++;
						var py = opEx[opExPos];
						opExPos++;
						var ew = opEx[opExPos];
						opExPos++;
						var eh = opEx[opExPos];
						ctx.fillRect(px*scalexy+offx,py*scalexy+offy, ew*scalexy, eh*scalexy);
					break;
				default: // we use last function
						fetchOp = false;
						opExPos--;
						func = lastFunc;
					break;
			}
			
			lastFunc = func;
			
			if (fetchOp) {
				opExPos++;
				func = opEx[opExPos];
			}
		}
	}
}