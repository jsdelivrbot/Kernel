if(!_.table){_.table=1;(function($){var yP=function(a,b){this.X=a;this.hf=b?wP:xP},zP=function(a){this.X=a},AP=function(a){$.Yc.call(this);this.g=a;this.$=this.P=null},BP=function(a,b,c){AP.call(this,a);this.reset(b,c)},CP=function(a,b){AP.call(this,a);this.ke=b;this.b=null},DP=function(a,b){AP.call(this,a);this.ke=b;this.b=null},EP=function(a,b){$.X.call(this);this.b=[];this.f=$.fn(b,4);this.g=$.fn(a,5);this.o=0;this.P=[];this.K=[];this.G=[];this.ea=[];this.$=[];this.D={fill:"none",cellBorder:"black",topPadding:0,rightPadding:0,bottomPadding:0,
leftPadding:0,hAlign:"start",vAlign:"top",enabled:!0,wordWrap:"break-word",wordBreak:"normal"};this.D.fill="#fff"},GP=function(a){if(a.J(2048)){var b=[],c=a.o?a.b.length/a.o:0,d,e,f=Math.min(c,a.g),h=Math.min(a.o,a.f);for(d=0;d<f;d++){for(e=0;e<h;e++)b.push(a.b[d*a.o+e]);for(e=h;e<a.f;e++)b.push(FP(a,d,e));for(e=h;e<a.o;e++){var k=a,l=a.b[d*a.o+e];l.content(null);k.P.push(l)}}for(d=f;d<a.g;d++)for(e=0;e<a.f;e++)b.push(FP(a,d,e));for(d=f;d<c;d++)for(e=0;e<a.o;e++)f=a,h=a.b[d*a.o+e],h.content(null),
f.P.push(h);a.b=b;a.o=window.NaN;a.I(2048);a.u(1984)}},IP=function(a){if(a.J(64)){var b=a.ob(),c=HP(a.f,a.G,a.Iq,a.Hq,a.dI,a.cI,a.bI,b.width,a.$);b=HP(a.g,a.K,a.Ar,a.zr,a.rH,a.gI,a.fI,b.height,a.ea);a.I(64);if(c||b)a.$=c||a.$,a.ea=b||a.ea,a.u(1792)}},KP=function(a,b,c,d,e,f,h){if(f&&"none"!=f){var k=(f.thickness?f.thickness:1)%2?.5:0;b=JP(a,b,c,d,e);c=$.vk(f);c in a.Lt?a=a.Lt[c]:(d=a.Mm.length?a.Mm.pop():$.Vi(),a.yb.xc(d),$.D(f)&&"keys"in f&&!$.D(f.mode)&&(f=$.uk(f),f.mode=a.ob()),d.stroke(f),d.fill(null),
a=a.Lt[c]=d);switch(h){case 0:a.moveTo(b.wb(),b.Tb()+k);a.lineTo(b.Wa()+1,b.Tb()+k);break;case 1:a.moveTo(b.Wa()+k,b.Tb());a.lineTo(b.Wa()+k,b.Na()+1);break;case 2:a.moveTo(b.wb(),b.Na()+k);a.lineTo(b.Wa()+1,b.Na()+k);break;case 3:a.moveTo(b.wb()+k,b.Tb()),a.lineTo(b.wb()+k,b.Na()+1)}}},LP=function(a,b,c){if(b||c){var d;if((d=b&&b.$a("bottomBorder"))||(d=c&&c.$a("topBorder"))||(d=b&&b.$a("border"))||(d=c&&c.$a("border")))return d;if(a.Qm){var e=a.Qm[(b||window.NaN)&&b.f],f=a.Qm[(c||window.NaN)&&c.f];
if((d=e&&e.$a("bottomBorder"))||(d=f&&f.$a("topBorder"))||(d=e&&e.$a("border"))||(d=f&&f.$a("border"))||(d=e&&e.$a("cellBottomBorder"))||(d=f&&f.$a("cellTopBorder"))||(d=e&&e.$a("cellBorder"))||(d=f&&f.$a("cellBorder")))return d}if(e=a.om&&a.om[(b||c).D])if((d=!b&&(e.$a("topBorder")||e.$a("border"))||!c&&(e.$a("bottomBorder")||e.$a("border")))||(d=e.$a("cellBottomBorder"))||(d=e.$a("cellTopBorder"))||(d=e.$a("cellBorder"))||(d=e.$a("cellBorder")))return d;return(d=!b&&(a.$a("topBorder")||a.$a("border"))||
!c&&(a.$a("bottomBorder")||a.$a("border")))||(d=b&&a.$a("cellBottomBorder"))?d:(d=c&&a.$a("cellTopBorder"))?d:a.$a("cellBorder")||"none"}return"none"},MP=function(a,b,c){if(b||c){var d;if((d=b&&b.$a("rightBorder"))||(d=c&&c.$a("leftBorder"))||(d=b&&b.$a("border"))||(d=c&&c.$a("border")))return d;var e=a.Qm&&a.Qm[(b||c).f];if(e&&((d=!b&&(e.$a("leftBorder")||e.$a("border"))||!c&&(e.$a("rightBorder")||e.$a("border")))||(d=e.$a("cellRightBorder"))||(d=e.$a("cellLeftBorder"))||(d=e.$a("cellBorder"))||
(d=e.$a("cellBorder"))))return d;if(a.om){e=a.om[(b||window.NaN)&&b.D];var f=a.om[(c||window.NaN)&&c.D];if((d=e&&e.$a("rightBorder"))||(d=f&&f.$a("leftBorder"))||(d=e&&e.$a("border"))||(d=f&&f.$a("border"))||(d=e&&e.$a("cellRightBorder"))||(d=f&&f.$a("cellLeftBorder"))||(d=e&&e.$a("cellBorder"))||(d=f&&f.$a("cellBorder")))return d}return(d=!b&&(a.$a("leftBorder")||a.$a("border"))||!c&&(a.$a("rightBorder")||a.$a("border")))||(d=b&&a.$a("cellRightBorder"))?d:(d=c&&a.$a("cellLeftBorder"))?d:a.$a("cellBorder")||
"none"}return"none"},NP=function(a,b,c){if($.n(c)){var d=!1;null===c?a.Ar&&b in a.Ar&&(delete a.Ar[b],d=!0):(a.Ar||(a.Ar=[]),a.Ar[b]!=c&&(a.Ar[b]=c,d=!0));d&&a.u(64,1);return a}return a.Ar&&b in a.Ar?a.Ar[b]:null},OP=function(a,b,c){if($.n(c)){var d=!1;null===c?a.zr&&b in a.zr&&(delete a.zr[b],d=!0):(a.zr||(a.zr=[]),a.zr[b]!=c&&(a.zr[b]=c,d=!0));d&&a.u(64,1);return a}return a.zr&&b in a.zr?a.zr[b]:null},PP=function(a,b,c){return $.n(c)?(a.G[b]!=c&&(null===c?delete a.G[b]:a.G[b]=c,a.u(64,1)),a):b in
a.G?a.G[b]:null},QP=function(a,b,c){if($.n(c)){var d=!1;null===c?a.Iq&&b in a.Iq&&(delete a.Iq[b],d=!0):(a.Iq||(a.Iq=[]),a.Iq[b]!=c&&(a.Iq[b]=c,d=!0));d&&a.u(64,1);return a}return a.Iq&&b in a.Iq?a.Iq[b]:null},RP=function(a,b,c){if($.n(c)){var d=!1;null===c?a.Hq&&b in a.Hq&&(delete a.Hq[b],d=!0):(a.Hq||(a.Hq=[]),a.Hq[b]!=c&&(a.Hq[b]=c,d=!0));d&&a.u(64,1);return a}return a.Hq&&b in a.Hq?a.Hq[b]:null},JP=function(a,b,c,d,e,f){GP(a);IP(a);var h=a.ob();f=$.K(f,$.J)?f:new $.J(0,0,0,0);var k=a.$[c-1]+1||
0;c=a.$[Math.min(c+e,a.f)-1];f.width=c-k;f.left=h.left+k;k=a.ea[b-1]+1||0;c=a.ea[Math.min(b+d,a.g)-1];f.height=c-k;f.top=h.top+k;return f},HP=function(a,b,c,d,e,f,h,k,l){var m,p=!1,q=0,r=[],t=[],u=[],v=0;e=$.M(e,k);f=$.M(f,k);h=$.M(h,k);var x=!1;for(m=0;m<a;m++){var w=c?$.M(c[m],k):window.NaN;var y=d?$.M(d[m],k):window.NaN;var B=b[m];var F=w,C=y;B=$.M(B,k);F=$.M(F,k);C=$.M(C,k);(0,window.isNaN)(B)&&(B=e);(0,window.isNaN)(F)&&(F=f);(0,window.isNaN)(C)&&(C=h);(0,window.isNaN)(F)||(B=Math.max(B,F));
(0,window.isNaN)(C)||(B=Math.min(B,C));(0,window.isNaN)(B)?(v++,(0,window.isNaN)(w)?(0,window.isNaN)(f)||(t[m]=f,x=!0):(t[m]=w,x=!0),(0,window.isNaN)(y)?(0,window.isNaN)(h)||(u[m]=h,x=!0):(u[m]=y,x=!0)):(q+=B,r[m]=B)}if(x&&0<v){var N=[];c=v*v;do for(d=!1,b=Math.max(3*v,k-q)/v,m=0;m<a;m++)if(!(m in r))if(m in N){if(N[m]==t[m]&&t[m]<b){q-=t[m];v++;delete N[m];d=!0;break}if(N[m]==u[m]&&u[m]>b){q-=u[m];v++;delete N[m];d=!0;break}}else{if(m in t&&t[m]>b){q+=N[m]=t[m];v--;d=!0;break}if(m in u&&u[m]<b){q+=
N[m]=u[m];v--;d=!0;break}}while(d&&0<v&&c--)}t=0;u=[];b=Math.max(3*v,k-q)/v;for(m=0;m<a;m++)m in r?B=r[m]:N&&m in N?B=N[m]:B=b,t+=B,k=Math.round(t)-1,u[m]=k,k!=l[m]&&(p=!0);return p?u:null},FP=function(a,b,c){return a.P.length?a.P.pop().reset(b,c):new BP(a,b,c)},YP=function(a,b,c,d,e,f){return c.o&&c.o[b]||d&&d.o&&d.o[b]||e&&e.o&&e.o[b]||a.D&&a.D[b]||f},ZP=function(a,b){EP.call(this,a,b)};$.fv.prototype.Ms=$.ca(10,function(){return!0});$.pv.prototype.Ms=$.ca(9,function(){return!1});
var xP=["topBorder","rightBorder","bottomBorder","leftBorder"],wP=["cellTopBorder","cellRightBorder","cellBottomBorder","cellLeftBorder"];yP.prototype.top=function(a,b,c,d,e){null!=a&&(a=$.Ob.apply(null,arguments));return this.X.$a(this.hf[0],a,256)};yP.prototype.right=function(a,b,c,d,e){null!=a&&(a=$.Ob.apply(null,arguments));return this.X.$a(this.hf[1],a,256)};yP.prototype.bottom=function(a,b,c,d,e){null!=a&&(a=$.Ob.apply(null,arguments));return this.X.$a(this.hf[2],a,256)};
yP.prototype.left=function(a,b,c,d,e){null!=a&&(a=$.Ob.apply(null,arguments));return this.X.$a(this.hf[3],a,256)};var $P=yP.prototype;$P.top=$P.top;$P.right=$P.right;$P.bottom=$P.bottom;$P.left=$P.left;var aQ=["topPadding","rightPadding","bottomPadding","leftPadding"];zP.prototype.top=function(a){$.n(a)&&(a=$.cn(a)||0);return this.X.$a(aQ[0],a,1024)};zP.prototype.right=function(a){$.n(a)&&(a=$.cn(a)||0);return this.X.$a(aQ[1],a,1024)};zP.prototype.bottom=function(a){$.n(a)&&(a=$.cn(a)||0);return this.X.$a(aQ[2],a,1024)};zP.prototype.left=function(a){$.n(a)&&(a=$.cn(a)||0);return this.X.$a(aQ[3],a,1024)};var bQ=zP.prototype;bQ.top=bQ.top;bQ.right=bQ.right;bQ.bottom=bQ.bottom;bQ.left=bQ.left;$.H(AP,$.Yc);$.g=AP.prototype;$.g.$a=function(a,b,c){if($.n(a)){if($.n(b)){var d=!1;null===b?this.o&&this.o[a]&&(delete this.o[a],d=!0):(this.o||(this.o={}),this.o[a]!=b&&(this.o[a]=b,d=!0));d&&this.g.u(+c||1024,1);return this}return this.o&&this.o[a]}return this.o||{}};$.g.fontSize=function(a){$.n(a)&&(a=$.cn(a));return this.$a("fontSize",a)};$.g.fontFamily=function(a){$.n(a)&&(a=String(a));return this.$a("fontFamily",a)};$.g.T6=function(a){$.n(a)&&(a=String(a));return this.$a("fontColor",a)};
$.g.V6=function(a){$.n(a)&&(a=$.Ya(+a,0,1));return this.$a("fontOpacity",a)};$.g.U6=function(a){$.n(a)&&(a=$.Ij(a));return this.$a("fontDecoration",a)};$.g.fontStyle=function(a){$.n(a)&&(a=$.Jj(a));return this.$a("fontStyle",a)};$.g.fontVariant=function(a){$.n(a)&&(a=$.Kj(a));return this.$a("fontVariant",a)};$.g.fontWeight=function(a){$.n(a)&&(a=$.cn(a));return this.$a("fontWeight",a)};$.g.letterSpacing=function(a){$.n(a)&&(a=$.cn(a));return this.$a("letterSpacing",a)};
$.g.W6=function(a){$.n(a)&&(a=$.Lj(a));return this.$a("textDirection",a)};$.g.lineHeight=function(a){$.n(a)&&(a=$.cn(a));return this.$a("lineHeight",a)};$.g.textIndent=function(a){$.n(a)&&(a=(0,window.parseFloat)($.cn(a)));return this.$a("textIndent",a)};$.g.vAlign=function(a){$.n(a)&&(a=$.Hj(a));return this.$a("vAlign",a)};$.g.xl=function(a){$.n(a)&&(a=$.Gj(a));return this.$a("hAlign",a)};$.g.wordWrap=function(a){return this.$a("wordWrap",a)};$.g.ut=function(a){return this.$a("wordBreak",a)};
$.g.textOverflow=function(a){$.n(a)&&(a=String(a));return this.$a("textOverflow",a)};$.g.fm=function(a){$.n(a)&&(a=!!a);return this.$a("selectable",a)};$.g.gd=function(a){$.n(a)&&(a=!!a);return this.$a("disablePointerEvents",a)};$.g.X6=function(a){$.n(a)&&(a=!!a);return this.$a("useHtml",a)};
$.g.S6=function(a,b,c,d,e){if($.n(a)){null===a||(a=$.Ob.apply(null,arguments));$.V(this.g);this.$a("border",a,256);for(var f=0;4>f;f++)this.$a(xP[f],null,256);this.g.ba(!0);return this}return this.P||(this.P=new yP(this,!1))};
$.g.YR=function(a,b,c,d){if($.n(a)){var e,f,h;if($.A(a)){var k=a;a=k[0];b=k[1];c=k[2];d=k[3];k=k.length}else k=arguments.length;if(k)$.D(a)?(e=$.cn(a.top)||0,f=$.cn(a.right)||0,h=$.cn(a.bottom)||0,l=$.cn(a.left)||0):1==k?l=h=f=e=$.cn(a)||0:2==k?(h=e=$.cn(a)||0,l=f=$.cn(b)||0):3==k?(e=$.cn(a)||0,l=f=$.cn(b)||0,h=$.cn(c)||0):4<=k&&(e=$.cn(a)||0,f=$.cn(b)||0,h=$.cn(c)||0,l=$.cn(d)||0);else var l=h=f=e=0;$.V(this.g);this.$a(aQ[0],e,1024);this.$a(aQ[1],f,1024);this.$a(aQ[2],h,1024);this.$a(aQ[3],l,1024);
this.g.ba(!0);return this}return this.$||(this.$=new zP(this))};var cQ=AP.prototype;cQ.fontSize=cQ.fontSize;cQ.fontFamily=cQ.fontFamily;cQ.fontColor=cQ.T6;cQ.fontOpacity=cQ.V6;cQ.fontDecoration=cQ.U6;cQ.fontStyle=cQ.fontStyle;cQ.fontVariant=cQ.fontVariant;cQ.fontWeight=cQ.fontWeight;cQ.letterSpacing=cQ.letterSpacing;cQ.textDirection=cQ.W6;cQ.lineHeight=cQ.lineHeight;cQ.textIndent=cQ.textIndent;cQ.vAlign=cQ.vAlign;cQ.hAlign=cQ.xl;cQ.wordWrap=cQ.wordWrap;cQ.wordBreak=cQ.ut;cQ.textOverflow=cQ.textOverflow;
cQ.selectable=cQ.fm;cQ.disablePointerEvents=cQ.gd;cQ.useHtml=cQ.X6;cQ.border=cQ.S6;$.H(BP,AP);$.g=BP.prototype;$.g.reset=function(a,b){($.ea(this.fd)||$.z(this.fd))&&$.Zc(this.sh);this.G=this.K=1;this.f=a;this.D=b;this.sh=this.fd=null;this.b=window.NaN;delete this.o;return this};
$.g.content=function(a){if($.n(a)){if(this.fd!=a){this.fd=a;this.sh&&this.g.yD(this.sh);if($.ea(a)||$.z(a)){var b=this.g;b.ah||(b.ah=new $.Es,b.ah.N($.Qk("standalones.labelsFactory")),b.ah.anchor("center"),b.ah.position("center"));this.sh=b.ah.add({value:String(a)},{value:{x:0,y:0}})}else $.K(a,$.vf)?(this.sh=$.Ti(),this.sh.xc(a)):this.sh=a;this.g.u(1024,1)}return this}return this.fd};$.g.Uv=function(a){return $.n(a)?(a=$.fn(a,this.G),a!=this.G&&(this.G=a,this.g.u(128,1)),this):this.G};
$.g.Vv=function(a){return $.n(a)?(a=$.fn(a,this.K),a!=this.K&&(this.K=a,this.g.u(128,1)),this):this.K};$.g.c7=function(){return this.f};$.g.Z6=function(){return this.D};$.g.Vn=function(){return this.g.Vn(this.f)};$.g.Y6=function(){return this.g.hV(this.D)};$.g.eb=function(){return JP(this.g,this.f,this.D,this.K,this.G)};$.g.fill=function(a,b,c,d,e,f,h){null!=a&&(a=$.Lb.apply(null,arguments));return this.$a("fill",a,512)};$.g.padding=function(a,b,c,d){return this.YR.apply(this,arguments)};
$.g.R=function(){($.ea(this.fd)||$.z(this.fd))&&$.Zc(this.sh);BP.B.R.call(this)};var dQ=BP.prototype;dQ.content=dQ.content;dQ.rowSpan=dQ.Vv;dQ.colSpan=dQ.Uv;dQ.padding=dQ.padding;dQ.getBounds=dQ.eb;dQ.getRowNum=dQ.c7;dQ.getColNum=dQ.Z6;dQ.getRow=dQ.Vn;dQ.getCol=dQ.Y6;dQ.fill=dQ.fill;$.H(CP,AP);$.g=CP.prototype;$.g.g7=function(){return this.ke};$.g.f7=function(a){return this.g.Mx(a,this.ke)};$.g.width=function(a){return $.n(a)?(PP(this.g,this.ke,a),this):PP(this.g,this.ke)};$.g.minWidth=function(a){return $.n(a)?(QP(this.g,this.ke,a),this):QP(this.g,this.ke)};$.g.maxWidth=function(a){return $.n(a)?(RP(this.g,this.ke,a),this):RP(this.g,this.ke)};$.g.jV=function(a,b,c,d,e,f,h){null!=a&&(a=$.Lb.apply(null,arguments));return this.$a("fill",a,512)};
$.g.d7=function(a,b,c,d,e){if($.n(a)){null===a||(a=$.Ob.apply(null,arguments));$.V(this.g);this.$a("cellBorder",a,256);for(var f=0;4>f;f++)this.$a(wP[f],null,256);this.g.ba(!0);return this}return this.b||(this.b=new yP(this,!0))};$.g.e7=function(a,b,c,d){return this.YR.apply(this,arguments)};var eQ=CP.prototype;eQ.width=eQ.width;eQ.maxWidth=eQ.maxWidth;eQ.minWidth=eQ.minWidth;eQ.getCell=eQ.f7;eQ.getColNum=eQ.g7;eQ.cellFill=eQ.jV;eQ.cellBorder=eQ.d7;eQ.cellPadding=eQ.e7;$.H(DP,AP);$.g=DP.prototype;$.g.k7=function(){return this.ke};$.g.j7=function(a){return this.g.Mx(this.ke,a)};$.g.height=function(a){return $.n(a)?(this.g.f_(this.ke,a),this):this.g.f_(this.ke)};$.g.minHeight=function(a){return $.n(a)?(NP(this.g,this.ke,a),this):NP(this.g,this.ke)};$.g.maxHeight=function(a){return $.n(a)?(OP(this.g,this.ke,a),this):OP(this.g,this.ke)};$.g.kV=function(a,b,c,d,e,f,h){null!=a&&(a=$.Lb.apply(null,arguments));return this.$a("fill",a,512)};
$.g.h7=function(a,b,c,d,e){if($.n(a)){null===a||(a=$.Ob.apply(null,arguments));$.V(this.g);this.$a("cellBorder",a,256);for(var f=0;4>f;f++)this.$a(wP[f],null,256);this.g.ba(!0);return this}return this.b||(this.b=new yP(this,!0))};$.g.i7=function(a,b,c,d){return this.YR.apply(this,arguments)};var fQ=DP.prototype;fQ.height=fQ.height;fQ.maxHeight=fQ.maxHeight;fQ.minHeight=fQ.minHeight;fQ.getCell=fQ.j7;fQ.getRowNum=fQ.k7;fQ.cellFill=fQ.kV;fQ.cellBorder=fQ.h7;fQ.cellPadding=fQ.i7;$.H(EP,$.ns);$.g=EP.prototype;$.g.ua=$.ns.prototype.ua;$.g.oa=$.ns.prototype.oa|4032;$.g.ah=null;$.g.yb=null;$.g.fD=null;$.g.Lt=null;$.g.ku=null;$.g.Mm=null;$.g.wA=null;$.g.fV=null;$.g.gV=null;$.g.iV=null;$.g.Qm=null;$.g.om=null;$.g.Ar=null;$.g.zr=null;$.g.Iq=null;$.g.Hq=null;$.g.rH=null;$.g.gI=null;$.g.fI=null;$.g.dI=null;$.g.cI=null;$.g.bI=null;$.g.xS=function(a){return $.n(a)?(a=$.fn(a,this.g),this.g!=a&&((0,window.isNaN)(this.o)&&(this.o=this.f),this.g=a,this.u(2176,1)),this):this.g};
$.g.jO=function(a){return $.n(a)?(a=$.fn(a,this.f),this.f!=a&&((0,window.isNaN)(this.o)&&(this.o=this.f),this.f=a,this.u(2176,1)),this):this.f};$.g.Mx=function(a,b){GP(this);a=$.fn(a,window.NaN,!0);b=$.fn(b,window.NaN,!0);return this.b[a*this.f+b]||null};$.g.Vn=function(a){GP(this);a=$.fn(a,window.NaN,!0);if((0,window.isNaN)(a)||a>=this.g)return null;this.Qm||(this.Qm=[]);a in this.Qm||(this.Qm[a]=new DP(this,a));return this.Qm[a]};
$.g.hV=function(a){GP(this);a=$.fn(a,window.NaN,!0);if((0,window.isNaN)(a)||a>=this.f)return null;this.om||(this.om=[]);a in this.om||(this.om[a]=new CP(this,a));return this.om[a]};$.g.Pda=function(a){return $.n(a)?(this.rH!=a&&(this.rH=a,this.u(64,1)),this):this.rH};$.g.Rda=function(a){return $.n(a)?(this.gI!=a&&(this.gI=a,this.u(64,1)),this):this.gI};$.g.Qda=function(a){return $.n(a)?(this.fI!=a&&(this.fI=a,this.u(64,1)),this):this.fI};
$.g.o8=function(a){return $.n(a)?(this.dI!=a&&(this.dI=a,this.u(64,1)),this):this.dI};$.g.n8=function(a){return $.n(a)?(this.cI!=a&&(this.cI=a,this.u(64,1)),this):this.cI};$.g.m8=function(a){return $.n(a)?(this.bI!=a&&(this.bI=a,this.u(64,1)),this):this.bI};$.g.J6=function(a,b,c,d,e){if($.n(a)){null===a||(a=$.Ob.apply(null,arguments));$.V(this);this.$a("border",a,256);for(var f=0;4>f;f++)this.$a(xP[f],null,256);this.ba(!0);return this}return this.fV||(this.fV=new yP(this,!1))};
$.g.v8=function(a,b){var c;if($.n(a)){var d=!$.A(a);var e=0;if(!d){var f=a.length;for(c=0;c<f;c++){var h=a[c];if($.A(h))h.length>e&&(e=h.length);else{d=!0;break}}}if(!d&&f&&e){$.V(this);this.xS(f);this.jO(e);if(b)for(c=0;c<f;c++)for(d=0;d<e;d++){var k=this.Mx(c,d);k.Vv(1);k.Uv(1)}for(c=0;c<f;c++)for(h=a[c],d=0;d<e;d++){k=this.Mx(c,d);var l=h[d];k.content($.n(l)?l:null)}this.ba(!0)}else $.Pj(3);return this}e=[];for(c=0;c<this.g;c++){h=[];for(d=0;d<this.f;d++)h.push(this.Mx(c,d).content());e.push(h)}return e};
$.g.W=function(){if(!this.Bc())return this;this.yb||(this.yb=$.Ti(),$.is(this,this.yb),this.fD=this.yb.ve());var a=this.yb.Da(),b=a&&!a.Ne();b&&a.suspend();this.J(4)&&(this.u(64),($.$m(this.left())||$.$m(this.top()))&&this.u(1792),this.I(4));this.ah&&$.V(this.ah);GP(this);IP(this);if(this.J(128)){var c,d;for(c=0;c<this.b.length;c++)this.b[c].b=window.NaN;for(var e=0;e<this.g;e++)for(var f=0;f<this.f;f++){var h=e*this.f+f,k=this.b[h];if((0,window.isNaN)(k.b)&&(1<k.Uv()||1<k.Vv())){for(c=Math.min(this.g,
e+k.Vv());c-- >e;)for(d=Math.min(this.f,f+k.Uv());d-- >f;)this.b[c*this.f+d].b=h;k.b=window.NaN}}this.I(128);this.u(1792)}if(this.J(512)){this.Mm||(this.Mm=[]);if(this.ku)for(var l in this.ku)c=this.ku[l],c.clear(),c.parent(null),this.Mm.push(c),delete this.ku[l];else this.ku={};for(l=0;l<this.g;l++)for(c=0;c<this.f;c++)if(f=this.b[l*this.f+c],(0,window.isNaN)(f.b)){var m=JP(this,l,c,f.Vv(),f.Uv(),m);d=l;e=c;d=(f=f.fill())?f:(f=this.Qm&&this.Qm[d]&&this.Qm[d].kV())?f:(f=this.om&&this.om[e]&&this.om[e].jV())?
f:(f=d%2?this.i_():this.e_())?f:this.$a("fill");d&&(e=$.vk(d),e in this.ku?d=this.ku[e]:(f=this.Mm.length?this.Mm.pop():$.Vi(),this.yb.Lf(f,0),f.fill(d),f.stroke(null),d=this.ku[e]=f),e=m.wb(),f=m.Wa()+1,h=m.Tb(),k=m.Na()+1,d.moveTo(e,h),d.lineTo(f,h),d.lineTo(f,k),d.lineTo(e,k),d.close())}this.I(512)}if(this.J(256)){this.Mm||(this.Mm=[]);if(this.Lt)for(var p in this.Lt)m=this.Lt[p],m.clear(),m.parent(null),this.Mm.push(m),delete this.Lt[p];else this.Lt={};for(m=0;m<this.f;m++)l=this.b[m],(0,window.isNaN)(l.b)&&
KP(this,0,m,1,l.Uv(),LP(this,void 0,l),0);for(p=0;p<this.g;p++)l=this.b[p*this.f],(0,window.isNaN)(l.b)&&KP(this,p,0,l.Vv(),1,MP(this,void 0,l),3);for(p=0;p<this.g;p++)for(m=0;m<this.f;m++)d=p*this.f+m,l=this.b[d],(c=this.b[d+this.f])?(0,window.isNaN)(l.b)?(0,window.isNaN)(c.b)||(c.b==d?l=c=void 0:c=this.b[c.b]):(0,window.isNaN)(c.b)?l=this.b[l.b]:l.b==c.b?l=c=void 0:(l=this.b[l.b],c=this.b[c.b]):(0,window.isNaN)(l.b)||(l=this.b[l.b]),KP(this,p,m,1,1,LP(this,l,c),2),d=p*this.f+m,l=this.b[d],(c=m+
1==this.f?void 0:this.b[d+1])?(0,window.isNaN)(l.b)?(0,window.isNaN)(c.b)||(c.b==d?l=c=void 0:c=this.b[c.b]):(0,window.isNaN)(c.b)?l=this.b[l.b]:l.b==c.b?l=c=void 0:(l=this.b[l.b],c=this.b[c.b]):(0,window.isNaN)(l.b)||(l=this.b[l.b]),KP(this,p,m,1,1,MP(this,l,c),1);this.I(256)}if(this.J(1024)){if(this.wA)for(;this.wA.length;){var q=this.wA.pop();$.K(q,$.vf)?q.remove():($.V(q),$.K(q,$.Js)?(f=q,$.Ps(f)&&$.Ps(f).clear(f.ja())):$.K(q,$.yv)?(d=q,$.zv(d)&&$.zv(d).clear(d.ja())):$.K(q,$.X)&&(q.Ms&&q.Ms()&&
(d=q,d.pD(d.sZ)),q.O(null),q.remove()),$.Fp(q,this.nQ),q.ba(!1))}p=this.g*this.f;for(m=0;m<p;m++)d=this.b[m],!(0,window.isNaN)(d.b)&&(q=d.sh)&&($.K(q,$.ag)?(q.yj(),$.Zc(q)):($.V(q),$.Fp(q,this.nQ),$.K(q,$.Js)||$.K(q,$.yv)?q.enabled(!1):q.Ms&&q.Ms()&&(d=q,d.pD(d.sZ)),q.O(null),q.remove(),q.ba(!1)));p=new $.xs;$.V(p);for(m=0;m<this.g;m++)for(l=0;l<this.f;l++)if(d=this.b[m*this.f+l],q=d.sh,c=$.K(q,$.vf),q){e=this.Qm&&this.Qm[m];h=this.om&&this.om[l];c||$.V(q);if((0,window.isNaN)(d.b)){var r=JP(this,
m,l,d.Vv(),d.Uv(),r);p.top(this.cJ("topPadding",d,e,h,this));p.right(this.cJ("rightPadding",d,e,h,this));p.bottom(this.cJ("bottomPadding",d,e,h,this));p.left(this.cJ("leftPadding",d,e,h,this));r=p.fj(r);if(c){q.parent(this.fD);f=q.$d(0);var t=YP(this,"hAlign",d,e,h,"start");k=YP(this,"vAlign",d,e,h,"top");"start"==t?t="rtl"==YP(this,"textDirection",d,e,h,"rtl")?"right":"left":"end"==t&&(t="rtl"==YP(this,"textDirection",d,e,h,"rtl")?"left":"right");switch(t){case "right":d=r.left+r.width-f.uP();break;
case "center":d=r.left+(r.width-f.uP())/2;break;default:d=r.left}switch(k){case "bottom":e=r.top+r.height-f.tP();break;case "middle":e=r.top+(r.height-f.tP())/2;break;default:e=r.top}f.setPosition(d,e);q.clip(r)}else{q.O(this.fD);if($.K(q,$.Js))if(f=q,f.rc({value:{x:r.left,y:r.top}}),$.Ps(f)==this.ah){f.anchor("left-top");f.width(r.width);f.height(r.height);(q=h&&h.o)&&f.N(q);(q=e&&e.o)&&f.N(q);(q=d.o)&&f.N(q);f.ba(!1);continue}else e=f.i("position")||$.Qs(f)&&$.Qs(f).i("position")||$.Ps(f)&&$.Ps(f).i("position"),
e={value:$.gn(r,e)},f.rc(e),f.W();else $.K(q,$.yv)?(d=q,e=d.position()||$.Av(d)&&$.Av(d).position()||$.zv(d)&&$.zv(d).position(),e={value:$.gn(r,e)},d.rc(e),d.W()):$.K(q,$.X)&&(q.Ms&&q.Ms()&&(d=q,d.sZ=d.pD(),d.pD(!1)),d=q,d.ka(r),d.W&&d.W());$.U(q,this.nQ)}}c||q.ba(!1)}p.ba(!1);this.ah&&($.V(this.ah),this.ah.N(this.D),this.ah.O(this.fD),this.ah.ka(this.ob()),this.ah.W(),this.ah.ba(!1));this.I(1024)}this.ah&&this.ah.ba(!1);this.J(8)&&(this.yb.zIndex(this.zIndex()),this.I(8));this.J(2)&&(this.yb.parent(this.O()),
this.I(2));this.Ij||this.contextMenu({Aja:!0,enabled:!0});b&&a.resume();return this};$.g.Yg=function(a){return"contextmenu"==a.type?this.dispatchEvent(a):!1};$.g.remove=function(){this.yb&&this.yb.parent(null)};$.g.fontSize=function(a){$.n(a)&&(a=$.cn(a));return this.$a("fontSize",a)};$.g.fontFamily=function(a){$.n(a)&&(a=String(a));return this.$a("fontFamily",a)};$.g.N6=function(a){$.n(a)&&(a=String(a));return this.$a("fontColor",a)};
$.g.P6=function(a){$.n(a)&&(a=$.Ya(+a,0,1));return this.$a("fontOpacity",a)};$.g.O6=function(a){$.n(a)&&(a=$.Ij(a));return this.$a("fontDecoration",a)};$.g.fontStyle=function(a){$.n(a)&&(a=$.Jj(a));return this.$a("fontStyle",a)};$.g.fontVariant=function(a){$.n(a)&&(a=$.Kj(a));return this.$a("fontVariant",a)};$.g.fontWeight=function(a){$.n(a)&&(a=$.cn(a));return this.$a("fontWeight",a)};$.g.letterSpacing=function(a){$.n(a)&&(a=$.cn(a));return this.$a("letterSpacing",a)};
$.g.Q6=function(a){$.n(a)&&(a=$.Lj(a));return this.$a("textDirection",a)};$.g.lineHeight=function(a){$.n(a)&&(a=$.cn(a));return this.$a("lineHeight",a)};$.g.textIndent=function(a){$.n(a)&&(a=(0,window.parseFloat)($.cn(a)));return this.$a("textIndent",a)};$.g.vAlign=function(a){$.n(a)&&(a=$.Hj(a));return this.$a("vAlign",a)};$.g.xl=function(a){$.n(a)&&(a=$.Gj(a));return this.$a("hAlign",a)};$.g.ut=function(a){return this.$a("wordBreak",a)};$.g.wordWrap=function(a){return this.$a("wordWrap",a)};
$.g.textOverflow=function(a){$.n(a)&&(a=String(a));return this.$a("textOverflow",a)};$.g.fm=function(a){$.n(a)&&(a=!!a);return this.$a("selectable",a)};$.g.gd=function(a){$.n(a)&&(a=!!a);return this.$a("disablePointerEvents",a)};$.g.R6=function(a){$.n(a)&&(a=!!a);return this.$a("useHtml",a)};$.g.L6=function(a,b,c,d,e,f,h){null!=a&&(a=$.Lb.apply(null,arguments));return this.$a("fill",a,512)};$.g.i_=function(a,b,c,d,e,f,h){null!=a&&(a=$.Lb.apply(null,arguments));return this.$a("rowOddFill",a,512)};
$.g.e_=function(a,b,c,d,e,f,h){null!=a&&(a=$.Lb.apply(null,arguments));return this.$a("rowEvenFill",a,512)};$.g.K6=function(a,b,c,d,e){if($.n(a)){a=$.Ob.apply(null,arguments);$.V(this);this.$a("cellBorder",a,256);for(var f=0;4>f;f++)this.$a(wP[f],null,256);this.ba(!0);return this}return this.gV||(this.gV=new yP(this,!0))};
$.g.M6=function(a,b,c,d){if($.n(a)){var e,f,h;if($.A(a)){var k=a;a=k[0];b=k[1];c=k[2];d=k[3];k=k.length}else k=arguments.length;if(k)$.D(a)?(e=$.cn(a.top)||0,f=$.cn(a.right)||0,h=$.cn(a.bottom)||0,l=$.cn(a.left)||0):1==k?l=h=f=e=$.cn(a)||0:2==k?(h=e=$.cn(a)||0,l=f=$.cn(b)||0):3==k?(e=$.cn(a)||0,l=f=$.cn(b)||0,h=$.cn(c)||0):4<=k&&(e=$.cn(a)||0,f=$.cn(b)||0,h=$.cn(c)||0,l=$.cn(d)||0);else var l=h=f=e=0;$.V(this);this.$a(aQ[0],e,1024);this.$a(aQ[1],f,1024);this.$a(aQ[2],h,1024);this.$a(aQ[3],l,1024);
this.ba(!0);return this}return this.iV||(this.iV=new zP(this))};$.g.nQ=function(a){$.E(a.target.W)&&a.target.W()};$.g.$a=function(a,b,c){if($.n(a)){if($.n(b)){var d=!1;null===b?this.D[a]&&(delete this.D[a],d=!0):this.D[a]!=b&&(this.D[a]=b,d=!0);d&&this.u(+c||1024,1);return this}return this.D&&this.D[a]}return this.D||{}};$.g.f_=function(a,b){return $.n(b)?(this.K[a]!=b&&(null===b?delete this.K[a]:this.K[a]=b,this.u(64,1)),this):a in this.K?this.K[a]:null};$.g.yD=function(a){this.wA=this.wA||[];this.wA.push(a)};
$.g.cJ=function(a,b){for(var c=1;c<arguments.length;c++){var d=arguments[c];if(d&&(d=d.$a(a),null!=d))return d}return 0};$.g.R=function(){$.$c(this.b,this.P,this.Qm,this.om,this.ku,this.Lt,this.Mm);$.Zc(this.ah);$.Zc(this.yb);$.Zc(this.fD);$.Zc(this.Ij);delete this.D;EP.B.R.call(this)};$.g.iE=function(a){var b=$.fa.anychart.exports;b?this.qs||(this.qs=b.create()):$.Pj(4,null,["Exporting"]);return $.n(a)&&this.qs?(this.qs.Y(a),this):this.qs};
$.g.hl=function(a){var b=$.D(a)?a:{};a=b.rowsSeparator||"\n";$.Fn(a);var c=b.columnsSeparator||",";$.Fn(c);b=b.ignoreFirstRow||!1;var d=this.xS(),e=this.jO(),f,h,k,l=Array(d);for(f=0;f<d;f++)l[f]=Array(e);var m={},p=[];for(f=0;f<d;f++){for(h=0;h<e;h++)if(!(f*e+h in m)){var q=this.Mx(f,h);var r=q.content();r=$.z(r)||$.ea(r)||$.da(r)?String(r):"";-1!=r.indexOf(c)?(r=r.split('"').join('""'),r='"'+r+'"'):-1!=r.indexOf(a)&&(r=r.split('"').join('""'),r='"'+r+'"');l[f][h]=r;r=q.Uv();var t=q.Vv();if(2!=t+
r)for(q=0;q<t;q++)for(k=0;k<r;k++)if(0!=q||0!=k)l[f+q][h+k]="",m[(f+q)*e+(h+k)]=!0}p.push(l[f].join(c))}b&&p.shift();return p.join(a)};$.g.gx=function(a){var b=$.Sj.anychart.exports;if(b){var c=this.hl({rowsSeparator:"\n",columnsSeparator:",",ignoreFirstRow:!1});b.gx(this,c,a)}else $.Pj(4,null,["Exporting"])};$.g.ex=function(a,b){var c=$.Sj.anychart.exports;if(c){var d=this.hl(a);c.ex(this,d,b)}else $.Pj(4,null,["Exporting"])};$.H(ZP,EP);$.os(ZP,EP);
EP.prototype.contextMenu=function(a){!this.Ij&&(this.Ij=$.Sj.anychart.ui.contextMenu(!0))&&(this.Ij.itemsProvider(this.pO),this.Ij.attach(this));return $.n(a)?(this.Ij&&this.Ij.setup(a),this):this.Ij};EP.prototype.pO=function(a){var b={};$.Sj.anychart.exports&&$.Ec(b,$.uk(gQ.exporting));$.ti()&&a.menuParent&&$.Ec(b,$.uk(gQ[a.menuParent.fullScreen()?"full-screen-exit":"full-screen-enter"]));$.Ec(b,$.uk(gQ.main));return a.menuParent.Iz(b,a)};EP.prototype.Iz=function(a){return a};
var hQ={"save-table-as":{index:10,text:"Save table as...",iconClass:"ac ac-file-image-o",subMenu:{"save-table-as-png":{index:10,text:".png",iconClass:"ac ac-file-image-o",eventType:"anychart.saveAsPng",action:function(a){a.menuParent.ht()}},"save-table-as-jpg":{index:20,text:".jpg",iconClass:"ac ac-file-image-o",eventType:"anychart.saveAsJpg",action:function(a){a.menuParent.et()}},"save-table-as-pdf":{index:30,text:".pdf",iconClass:"ac ac-file-pdf-o",eventType:"anychart.saveAsPdf",action:function(a){a.menuParent.ft()}},
"save-table-as-svg":{index:40,text:".svg",iconClass:"ac ac-file-code-o",eventType:"anychart.saveAsSvg",action:function(a){a.menuParent.it()}}}},"save-data-as":{index:20,text:"Save data as...",iconClass:"ac ac-save",subMenu:{"save-data-as-text":{index:10,text:".csv",iconClass:"ac ac-file-excel-o",eventType:"anychart.saveAsCsv",action:function(a){a.menuParent.ex()}},"save-data-as-xlsx":{index:20,text:".xlsx",iconClass:"ac ac-file-excel-o",eventType:"anychart.saveAsXlsx",action:function(a){a.menuParent.gx()}}}},
"share-with":{index:30,text:"Share with...",iconClass:"ac ac-net",subMenu:{"share-with-facebook":{index:10,text:"Facebook",iconClass:"ac ac-facebook",eventType:"anychart.shareWithFacebook",action:function(a){a.menuParent.hC()}},"share-with-twitter":{index:20,text:"Twitter",iconClass:"ac ac-twitter",eventType:"anychart.shareWithTwitter",action:function(a){a.menuParent.kC()}},"share-with-linkedin":{index:30,text:"LinkedIn",iconClass:"ac ac-linkedin",eventType:"anychart.shareWithLinkedIn",action:function(a){a.menuParent.iC()}},
"share-with-pinterest":{index:40,text:"Pinterest",iconClass:"ac ac-pinterest",eventType:"anychart.shareWithPinterest",action:function(a){a.menuParent.jC()}}}},"print-table":{index:50,text:"Print",iconClass:"ac ac-print",eventType:"anychart.print",action:function(a){a.menuParent.print()}},"full-screen-enter":{index:60,text:"Enter full screen",action:function(a){a.menuParent.fullScreen(!0)}},"full-screen-exit":{index:60,text:"Exit full screen",action:function(a){a.menuParent.fullScreen(!1)}},about:{index:80,
iconClass:"ac ac-cog",text:"AnyChart "+$.$b.apply(null,["v%s.%s.%s.%s"].concat(["8","4","0","1922"])),href:"https://anychart.com"},"link-to-help":{index:110,iconClass:"ac ac-question",text:"Need help? Go to support center!",href:"https://anychart.com/support"},"version-history":{index:120,text:"Version History",href:""}},gQ={exporting:{"save-table-as":hQ["save-table-as"],"save-data-as":hQ["save-data-as"],"share-with":hQ["share-with"],"print-table":hQ["print-table"],"exporting-separator":{index:51}},
"full-screen-enter":{"full-screen-enter":hQ["full-screen-enter"],"full-screen-separator":{index:61}},"full-screen-exit":{"full-screen-exit":hQ["full-screen-exit"],"full-screen-separator":{index:61}},main:{about:hQ.about}};EP.prototype.fullScreen=function(a){var b=this.O();b=b?b.Da():null;return $.n(a)?(b&&b.fullScreen(a),this):b?b.fullScreen():!1};EP.prototype.Kw=function(){var a=this.O();return(a=a?a.Da():null)?a.Kw():!1};var iQ=EP.prototype;iQ.rowsCount=iQ.xS;iQ.colsCount=iQ.jO;iQ.getCell=iQ.Mx;
iQ.getRow=iQ.Vn;iQ.getCol=iQ.hV;iQ.rowsHeight=iQ.Pda;iQ.rowsMinHeight=iQ.Rda;iQ.rowsMaxHeight=iQ.Qda;iQ.colsWidth=iQ.o8;iQ.colsMinWidth=iQ.n8;iQ.colsMaxWidth=iQ.m8;iQ.border=iQ.J6;iQ.contents=iQ.v8;iQ.contextMenu=iQ.contextMenu;iQ.draw=iQ.W;iQ.fullScreen=iQ.fullScreen;iQ.isFullScreenAvailable=iQ.Kw;iQ.fontSize=iQ.fontSize;iQ.fontFamily=iQ.fontFamily;iQ.fontColor=iQ.N6;iQ.fontOpacity=iQ.P6;iQ.fontDecoration=iQ.O6;iQ.fontStyle=iQ.fontStyle;iQ.fontVariant=iQ.fontVariant;iQ.fontWeight=iQ.fontWeight;
iQ.letterSpacing=iQ.letterSpacing;iQ.textDirection=iQ.Q6;iQ.lineHeight=iQ.lineHeight;iQ.textIndent=iQ.textIndent;iQ.vAlign=iQ.vAlign;iQ.hAlign=iQ.xl;iQ.wordBreak=iQ.ut;iQ.wordWrap=iQ.wordWrap;iQ.textOverflow=iQ.textOverflow;iQ.selectable=iQ.fm;iQ.disablePointerEvents=iQ.gd;iQ.useHtml=iQ.R6;iQ.cellFill=iQ.L6;iQ.rowEvenFill=iQ.e_;iQ.rowOddFill=iQ.i_;iQ.cellBorder=iQ.K6;iQ.cellPadding=iQ.M6;iQ.saveAsPng=iQ.ht;iQ.saveAsJpg=iQ.et;iQ.saveAsPdf=iQ.ft;iQ.saveAsSvg=iQ.it;iQ.shareAsPng=iQ.mt;
iQ.shareAsJpg=iQ.Cz;iQ.shareAsPdf=iQ.Dz;iQ.shareAsSvg=iQ.Ez;iQ.getPngBase64String=iQ.zy;iQ.getJpgBase64String=iQ.xy;iQ.getSvgBase64String=iQ.Cy;iQ.getPdfBase64String=iQ.yy;iQ.toSvg=iQ.zp;iQ.toCsv=iQ.hl;iQ.saveAsCsv=iQ.ex;iQ.saveAsXlsx=iQ.gx;iQ.exports=iQ.iE;iQ.shareWithFacebook=iQ.hC;iQ.shareWithTwitter=iQ.kC;iQ.shareWithLinkedIn=iQ.iC;iQ.shareWithPinterest=iQ.jC;iQ.parentBounds=iQ.ka;iQ.container=iQ.O;iQ=ZP.prototype;iQ.draw=iQ.W;$.G("anychart.standalones.table",function(a,b){return new ZP(a,b)});}).call(this,$)}
