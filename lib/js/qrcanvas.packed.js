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
 
 eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('12 15(C){f(C==\'0\'){14 0}v{a 13=C.1r();a Y=1;f(C==13)Y=-1;a 1l=13.1i(0)-1w;14 1l*Y}}12 1Q(C){a b=1L 1Y();a r=C.o(\',\');1k(r.N>0){a Q=r.u();a J=Q.1r();1m(J){l\'P\':l\'R\':f(Q==J){b.d(\'S\')}v{b.d(\'W\')}b.d(J);a p=r.u();a V=p.N;U(a i=0;i<V;i++){a t=0;a X=p.16(i);f(X==\'z\'){t+=1S;i++}v f(X==\'Z\'){t+=1V;i++}v f(X==\'+\'){t+=1u;i++};a n=p.1i(i);f(n>=1j){t+=((n-1j)+10)}v f(n>=1h){t+=((n-1h)+1y)}v f(n>=1e){t+=(n-1e)}b.d(t+\'\')}k;l\'B\':a 1d=s(r.u());U(a 11=0;11<1d;11++){f(Q==J){b.d(\'S\')}v{b.d(\'W\')}b.d(\'B\');b.d(\'M\');a g=s(r.u());a h=s(r.u());b.d(g+\'\');b.d(h+\'\');b.d(\'T\');a p=r.u();p=p.o(\'1\').q(\'1z\').o(\'2\').q(\'1C\').o(\'3\').q(\'1F\').o(\'4\').q(\'1D\').o(\'5\').q(\'1E\').o(\'6\').q(\'1s\').o(\'7\').q(\'1x\').o(\'8\').q(\'1v\').o(\'9\').q(\'1t\');a V=p.N;U(a i=0;i<V;i+=2){g+=15(p.16(i));h+=15(p.16(i+1));b.d(g+\'\');b.d(h+\'\')}b.d(\'E\')}k;l\'O\':U(i=0;i<3;i++){a g=s(r.u());a h=s(r.u());b.d(\'S,R\');b.d(g);b.d(h);b.d(\'7,7,W,R\');b.d(g+1);b.d(h+1);b.d(\'5,5,S,R\');b.d(g+2);b.d(h+2);b.d(\'3,3\')}k}}14 b.q(\',\')}12 1K(b,1b,w,F,I,y,A){a G=1I.1J(1b);f(!y)y=2;f(!A)A=2;f(!F)F=G.1G;f(!I)I=G.1R;a K=s(F/(w+(y*2)));a L=s(I/(w+(A*2)));f(K<1)K=1;f(L<1)L=1;a e=1N.1O(K,L);a 1o=F-((w+(y*2))*e);a 1p=I-((w+(A*2))*e);a D=e*y+s(1o/2.0);a x=e*A+s(1p/2.0);a j=b.o(\',\');a 1n=j.N;a c=0;f(G.1q){a m=G.1q(\'1B\');a H=j[c];a 19=\'\';m.18="1c";m.17(D,x,w*e,w*e);1k(c<1n){a 1a=1M;1m(H){l\'S\':m.18="1P";k;l\'W\':m.18="1c";k;l\'B\':m.1X();k;l\'M\':c++;a g=j[c];c++;a h=j[c];m.1W(g*e+D,h*e+x);k;l\'T\':c++;a g=j[c];c++;a h=j[c];m.1U(g*e+D,h*e+x);k;l\'E\':m.1H();k;l\'P\':c++;a g=j[c];c++;a h=j[c];m.17(g*e+D,h*e+x,e,e);k;l\'R\':c++;a g=j[c];c++;a h=j[c];c++;a 1f=j[c];c++;a 1g=j[c];m.17(g*e+D,h*e+x,1f*e,1g*e);k;1A:1a=1T;c--;H=19;k}19=H;f(1a){c++;H=j[c]}}}}',62,123,'||||||||||var|ops|opExPos|push|scalexy|if|px|py||opEx|break|case|ctx||split|points|join|strTab|parseInt|ccode|shift|else||offy|xbord||ybord||str|offx||maxx|canvas|func|maxy|rcode|scalex|scaley||length|||code||||for|plen||fchar|multi|||no|function|updchar|return|QRdiffCharDecode|charAt|fillRect|fillStyle|lastFunc|fetchOp|elemId|white|count|48|ew|eh|65|charCodeAt|97|while|delta|switch|opExLen|diffx|diffy|getContext|toUpperCase|aB|Ba|180|bA|64|Ab|35|00|default|2d|aa|Aa|AA|aA|clientWidth|fill|document|getElementById|QRdrawCode|new|true|Math|min|black|QRdecompactOps|clientHeight|60|false|lineTo|120|moveTo|beginPath|Array'.split('|'),0,{}))
