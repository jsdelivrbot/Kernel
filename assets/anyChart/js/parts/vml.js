if(!_.vml){_.vml=1;(function($){var aO=function(a,b){var c=a.x-b.x,d=a.y-b.y;return Math.sqrt(c*c+d*d)},bO=function(a){var b=Math.pow(10,6);return Math.round(a*b)/b},cO=function(a,b,c,d,e){$.Yf.call(this,a,b,c,d,e)},dO=function(a,b,c,d,e,f,h){$.mi.call(this,a,b,c,b,b,f,h);this.b=d;this.f=e},eO=function(a,b,c,d,e,f,h){f=null!=f?$.Ya(f,0,1):1;var k=[];(0,$.le)(a,function(a){k.push(String(a.offset)+a.color+(a.opacity?a.opacity:null))});return k.join("")+f+b+c+d+e+(h?String(h.left)+h.top+h.width+h.height:"")},iO=function(){$.Cg.call(this);
var a=window.document;Xea()||a.createStyleSheet().addRule("."+fO,"behavior:url(#default#VML)");try{a.namespaces[gO]||a.namespaces.add(gO,Yea),this.f=function(a){return $.ie(gO+":"+a,{"class":fO})}}catch(b){this.f=function(a){return $.ie(gO+":"+a,{"class":fO,xmlns:"urn:schemas-microsoft.com:vml"})}}hO&&(this.gc=this.aea)},jO=function(a){return $.z(a)&&$.Zb(a,"%")?(0,window.parseFloat)(a)+"%":(0,window.parseFloat)(String(a))+"px"},kO=function(a){return 100*Math.round(a)},lO=function(a,b){a[b]&&(a.cssText=
a.cssText.replace(new RegExp("(^|; )("+b+": [^;]*)(;|$)","ig"),";"))},mO=function(a,b){a.gc(b,"coordsize",kO(1)+" "+kO(1));$.Ig(a,b.style,{position:"absolute",left:jO(0),top:jO(0),width:jO(1),height:jO(1)})},Xea=function(){return!!$.wa($.Li(),function(a){return a.selectorText==="."+fO})},nO=function(a,b){var c=a%90,d=$.I(a),e=1,f=b.left+b.width/2,h=b.top+b.height/2,k=0>Math.sin(d)||180==a||360==a;if(90==a||270==a)c+=1E-6;180!=a&&(0>Math.tan(d)||90==a||270==a)&&(e=-1,c=90-c);c=$.I(c);d=Math.tan(c);
d=Math.sin(c)*(b.height/2-d*b.width/2)+Math.sqrt(Math.pow(b.width/2,2)*(1+Math.pow(d,2)));e*=Math.cos(c)*d;c=Math.sin(c)*d;k&&(e=-e,c=-c);return{rh:new $.fb(Math.round(f-e),Math.round(h+c)),Yj:new $.fb(Math.round(f+e),Math.round(h-c))}},oO=function(a,b){if(b.rh.x==b.Yj.x){var c=b.rh.x;var d=a.y}else b.rh.y==b.Yj.y?(c=a.x,d=b.rh.y):(c=(b.rh.x*Math.pow(b.Yj.y-b.rh.y,2)+a.x*Math.pow(b.Yj.x-b.rh.x,2)+(b.Yj.x-b.rh.x)*(b.Yj.y-b.rh.y)*(a.y-b.rh.y))/(Math.pow(b.Yj.y-b.rh.y,2)+Math.pow(b.Yj.x-b.rh.x,2)),d=
(b.Yj.x-b.rh.x)*(a.x-c)/(b.Yj.y-b.rh.y)+a.y);c=new $.fb(c,d);d=[$.Ya(b.rh.x-b.Yj.x,-1,1),$.Ya(b.rh.y-b.Yj.y,-1,1)];var e=[$.Ya(b.rh.x-c.x,-1,1),$.Ya(b.rh.y-c.y,-1,1)],f=[$.Ya(b.Yj.x-c.x,-1,1),$.Ya(b.Yj.y-c.y,-1,1)];return 0>(0==d[0]?(e[1]+f[1])*d[1]:(e[0]+f[0])*d[0])?-aO(b.rh,c):aO(b.rh,c)},Zea=function(a,b,c,d){var e=nO(c,d);d=aO(e.rh,e.Yj);var f=nO(c,b);b=aO(f.rh,f.Yj);c=oO(e.rh,f);e=oO(e.Yj,f);f={offset:Math.round(c/b*100)/100,color:"",opacity:1};var h={offset:Math.round(e/b*100)/100,color:"",
opacity:1},k=[];k.toString=function(){for(var a="\n",b=0,c=this.length;b<c;b++)a+="offset: "+this[b].offset+"; color: "+this[b].color+"; opacity: "+this[b].opacity+"\n";return a};var l,m,p;k.push(f);for(p=0;p<a.length;p++){var q=a[p];q.color=$.fk(q.color).mj;q.offset<=f.offset?l={offset:q.offset,color:q.color,opacity:q.opacity}:q.offset>f.offset&&q.offset<h.offset?k.push({offset:q.offset,color:q.color,opacity:q.opacity}):q.offset>=h.offset&&!m&&(m={offset:q.offset,color:q.color,opacity:q.opacity})}k.push(h);
a=q=1;if(2<k.length){l||(l=k[1]);p=b*l.offset;var r=Math.abs(b*k[1].offset-p);var t=$.gk(String(l.color)),u=$.gk(String(k[1].color));q-=0==r?0:Math.abs(c-p)/r;f.color=$.Kb($.jk(t,u,q));m||(m=k[k.length-2]);r=b*m.offset;p=b*k[k.length-2].offset;q=Math.abs(p-r);r=$.gk(String(k[k.length-2].color));t=$.gk(String(m.color));a-=0==q?0:Math.abs(e-p)/q;h.color=$.Kb($.jk(r,t,a))}else l||0!=m.offset||(l=m),m||1!=l.offset||(m=l),p=b*l.offset,r=b*m.offset,t=$.gk(String(l.color)),u=$.gk(String(m.color)),r=Math.abs(r-
p),q-=0==r?0:Math.abs(c-p)/r,a-=0==r?0:Math.abs(e-p)/r,f.color=$.Kb($.jk(t,u,q)),h.color=$.Kb($.jk(t,u,a));f.opacity=l.opacity;h.opacity=m.opacity;for(p=0;p<k.length;p++)k[p].offset=0==p?0:p==k.length-1?1:Math.abs(c-k[p].offset*b)/d;return k},$ea=function(a,b){a=String(a);if(!a)return"none";var c=a.split(" ");0!=c.length%2&&c.push.apply(c,c);for(var d=[],e=0;e<c.length;e++)d.push(Math.ceil((0,window.parseFloat)(c[e])/b));return d.join(" ")},pO=function(a,b){$.Yc.call(this);this.Dc=a;this.hc=b},qO=
function(a){delete a.Dc;$.re(a.oy);a.oy=null},rO=function(a){$.oi.call(this,a);this.g={};this.G={}},afa=function(a,b,c){var d="";d=$.z(b)?d+(b+"1"):$.K(b,$.mi)?eO(b.keys,b.zc,b.pc,b.b,b.f,b.opacity,b.nb):$.K(b,$.ki)?$.li(b.keys,b.opacity,b.angle,b.mode):d+(b.color+b.opacity);if($.z(c))var e=c;else if("keys"in c){var f=0!=c.keys.length?c.keys[0]:c;e=f.color||"black";e+="opacity"in f?f.opacity:1}else e=c.color,e+="opacity"in c?c.opacity:1;d+=String(c.thickness)+e+c.lineJoin+c.lineCap+c.dash;if($.vc(a.g,
d))return a.g[d];b=new pO(b,c);return a.g[d]=b},bfa=function(a,b,c,d,e,f,h,k){k=null!=k?k:null;var l=eO(b,c,d,e,f,h,k);return $.vc(a.G,l)?a.G[l]:a.G[l]=new dO(b,c,d,e,f,h,k)},sO=function(a,b,c){$.zi.call(this,a,b,c)},tO=function(a,b){$.gh.call(this,a,b);this.bd=null;this.ra=!1;this.lg=null},uO=function(a){var b=a.lg;a=a.Sf();return null===b&&null===a?!1:null===b||null===a?!0:!(a.Dd==b.Dd&&a.Pe==b.Pe&&a.Fe==b.Fe&&a.Ae==b.Ae)},vO=function(a){var b=a.ra;a.ra=a.fq();var c=!b&&a.ra;b=b&&!a.ra;var d=!a.Da()||
a.Da().Ne();d||a.Da().suspend();c?(a.Hb(1024),a.Hb(32),a.Hb(16384),a.Hb(4),a.nb=new $.J(a.x(),a.y(),a.wd,a.Sd)):b&&(a.Hb(1024),a.Hb(32),a.Hb(16384),a.Hb(4),a.nb=a.Ul(a.bd,{}));d||a.Da().resume()};$.H(cO,$.Yf);cO.prototype.Hd=function(){var a=$.Zf(this),b=a&&!a.Ne();b&&a.suspend();(0,$.le)(this.elements,function(a){a.Hb(512)},this);b&&a.resume()};$.G("acgraph.vml.Clip",cO);$.H(dO,$.mi);$.H(iO,$.Cg);$.ja(iO);var Yea="urn:schemas-microsoft-com:vml",gO="any_vml",fO="any_vml",hO=$.fa.document&&$.fa.document.documentMode&&8<=$.fa.document.documentMode;$.g=iO.prototype;$.g.Vm=null;$.g.gj=null;$.g.JG=null;$.g.$y=null;$.g.lq=null;$.g.EF=null;$.g.aea=function(a,b,c){a[b]=c};$.g.uO=function(){return window.document.createElement("div")};
$.g.Jp=function(){this.$y=this.BO();mO(this,this.$y);this.$y.style.display="none";$.Ig(this,this.$y,{filled:"true",fillcolor:"black",stroked:"false",path:"m0,0 l1,0 e"});window.document.body.appendChild(this.$y);this.Vm=$.ie("DIV");this.gj=$.ie("SPAN");this.JG=$.ie("SPAN");window.document.body.appendChild(this.Vm);this.Vm.appendChild(this.JG);this.Vm.appendChild(this.gj);$.Je(this.Vm,{position:"absolute",visibility:"hidden",left:0,top:0});$.Je(this.JG,{"font-size":"0px",border:"0 solid"});this.JG.innerHTML=
"a";this.b=$.ie("SPAN");this.Vm.appendChild(this.b);$.Je(this.b,{"font-size":"0px",border:"0 solid"});this.b.innerHTML="a";this.EF=$.ie("IMG");$.Je(this.EF,{position:"absolute",left:0,top:0});this.Vm.appendChild(this.EF);this.ko=$.ie("DIV");this.Vm.appendChild(this.ko)};$.g.jK=function(a){this.Vm||this.Jp();this.gc(this.EF,"src",a);return $.Ze(this.EF)};
$.g.measure=function(a,b){if(""==a)return new $.J(0,0,0,0);this.Vm||this.Jp();$.re(this.lq);this.lq=this.NC("");this.$y.appendChild(this.lq);var c=null,d=0;if(" "==a)return $.Fg(this,b);$.Yb(a," ")&&(d+=c=$.Fg(this,b).width);$.Zb(a," ")&&(d+=c||$.Fg(this,b).width);lO(this.gj.style,"font-style");lO(this.gj.style,"font-variant");lO(this.gj.style,"font-family");lO(this.gj.style,"font-size");lO(this.gj.style,"font-weight");lO(this.gj.style,"letter-spacing");lO(this.gj.style,"text-decoration");this.gj.style.cssText=
"";b.fontStyle&&($.Je(this.gj,"font-style",b.fontStyle),$.Je(this.lq,"font-style",b.fontStyle));b.fontVariant&&($.Je(this.gj,"font-variant",b.fontVariant),$.Je(this.lq,"font-variant",b.fontVariant));b.fontFamily&&($.Je(this.gj,"font-family",b.fontFamily),$.Je(this.lq,"font-family",b.fontFamily));b.fontSize&&($.Je(this.gj,"font-size",b.fontSize),$.Je(this.lq,"font-size",b.fontSize));b.fontWeight?($.Je(this.gj,"font-weight",b.fontWeight),$.Je(this.lq,"font-weight",b.fontWeight)):($.Je(this.gj,"font-weight",
"normal"),$.Je(this.lq,"font-weight","normal"));b.letterSpacing&&($.Je(this.gj,"letter-spacing",b.letterSpacing),this.lq.style["v-text-spacing"]="normal"==b.letterSpacing?"":b.letterSpacing);b.Nq&&($.Je(this.gj,"text-decoration",b.decoration),$.Je(this.lq,"text-decoration",b.decoration));$.Je(this.gj,"border","0 solid");this.gc(this.lq,"string",a);c=$.Ze(this.$y).width;$.Je(this.Vm,{left:0,top:0,width:"auto",height:"auto"});this.gj.innerHTML=a;var e=$.Ze(this.JG);$.Qe(this.Vm,0,-(e.top+e.height));
e=$.Ze(this.gj);e.width=c+d;--e.left;this.gj.innerHTML="";return e};$.g.uR=function(a){this.Vm||this.Jp();$.z(a)?this.ko.innerHTML=a:(a=a.cloneNode(!0),this.ko.appendChild(a));a=$.Ze(this.ko);this.ko.innerHTML="";return a};$.g.uZ={1:"m",2:"l",3:"c",4:"ae",5:"x"};$.g.GZ=function(a,b){var c=b[2]+b[3];a.push(kO(b[4]-$.cb(c,b[0])),kO(b[5]-$.db(c,b[1])),kO(b[0]),kO(b[1]),Math.round(-65536*b[2]),Math.round(-65536*b[3]))};$.g.KZ=function(a,b){$.Uc(Array.prototype.push,(0,$.Va)(b,kO),a)};
$.g.jW=function(){return $.ie("div",{style:"overflow:hidden;position:relative;"})};$.g.pL=function(a,b,c){$.Ig(this,a.style,{width:jO(b),height:jO(c)})};$.g.tO=iO.prototype.uO;$.g.xA=iO.prototype.uO;$.g.aW=function(){return this.f("image")};$.g.VV=function(){return this.f("shape")};$.g.eW=function(){return this.f("shape")};$.g.ZV=function(){return this.f("shape")};$.g.cW=function(){return this.f("fill")};$.g.$V=iO.prototype.uO;$.g.s_=$.ia;$.g.y_=$.ia;
$.g.v_=function(a){$.Ig(this,a.da().style,{position:"absolute",left:jO(0),top:jO(0),width:jO(1),height:jO(1)})};
$.g.t_=function(a){var b=a.Ri(),c=a.da(),d=a.src()||"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",e=a.align();if(e==$.sg){e=b.left;var f=b.top;var h=b.width;var k=b.height}else{k=this.jK(d);h=k.width/b.width;f=k.height/b.height;var l=a.TA()==$.tg;f=1/((1<h&&1<f||1>h&&1>f?l?h>f:h<f:l?1<h:1>h)?h:f);h=k.width*f;k=k.height*f;switch(e){case $.sg:e=b.width;f=b.height;break;case "x-min-y-min":e=b.left;f=b.top;break;case "x-mid-y-min":e=b.left+b.width/2-h/2;f=b.top;break;
case "x-max-y-min":e=b.left+b.width-h;f=b.top;break;case "x-min-y-mid":e=b.left;f=b.top+b.height/2-k/2;break;default:case "x-mid-y-mid":e=b.left+b.width/2-h/2;f=b.top+b.height/2-k/2;break;case "x-max-y-mid":e=b.left+b.width-h;f=b.top+b.height/2-k/2;break;case "x-min-y-max":e=b.left;f=b.top+b.height-k;break;case "x-mid-y-max":e=b.left+b.width/2-h/2;f=b.top+b.height-k;break;case "x-max-y-max":e=b.left+b.width-h,f=b.top+b.height-k}}$.Ig(this,c.style,{position:"absolute",left:jO(e),top:jO(f),width:jO(h),
height:jO(k)});this.gc(c,"src",d);a.clip(b)};$.g.o_=function(a){this.MS(a)};$.g.MS=function(a){var b=a.da();mO(this,b);var c=a.Fp(),d=a.Gp(),e=a.zq(),f=a.Mv(),h=a.Sf();h&&!$.tb(h)?(c=$.ob(c,d,e,f,0,360,!1),d=c.length,h.transform(c,0,c,0,d/2),h=["m",kO(c[d-2]),kO(c[d-1]),"c"],$.Uc(Array.prototype.push,(0,$.Va)(c,kO),h)):h=["ae",kO(c),kO(d),kO(e),kO(f),0,-23592960];h.push("x");$.yf(a,4);$.yf(a,256);this.gc(b,"path",h.join(" "))};
$.g.QS=function(a){var b=a.da();mO(this,b);var c=$.Og(this,a,!0);c?this.gc(b,"path",c):(this.gc(b,"path","M 0,0"),b.removeAttribute("path"));$.yf(a,4);$.yf(a,256)};$.g.BO=function(){var a=this.f("shape"),b=this.f("path");b.setAttribute("textpathok","t");a.appendChild(b);return a};$.g.ey=function(){return window.document.createElement("span")};$.g.NC=function(a){var b=this.f("textpath");b.setAttribute("on","t");b.setAttribute("string",a);return b};
$.g.p_=function(a,b){var c=a.da();c&&(c.style.cursor=b||"")};$.g.SS=function(a){var b=a.da().style;if(a.fq()){if(!a.path()){var c=a.Ra;a.b.length&&(c-=a.b[0].g);var d=a.P;$.Ig(this,b,{position:"absolute",overflow:"visible",left:jO(d),top:jO(c)})}}else d=a.x(),c=a.y(),a.vAlign()&&a.height()&&a.height()>a.D&&("middle"==a.vAlign()&&(c+=a.height()/2-a.D/2),"bottom"==a.vAlign()&&(c+=a.height()-a.D)),$.Ig(this,b,{position:"absolute",overflow:"hidden",left:jO(d),top:jO(c)})};
$.g.TS=function(a){var b=a.da(),c=b.style;b.style.cssText="";a.fq()?(a.path()||$.Ig(this,c,{width:jO(1),height:jO(1)}),b.innerHTML=""):null!=a.bd&&(a.fontSize()&&$.Je(b,"font-size",a.fontSize()),a.color()&&$.Je(b,"color",a.color()),a.fontFamily()&&$.Je(b,"font-family",a.fontFamily()),a.fontStyle()&&$.Je(b,"font-style",a.fontStyle()),a.fontVariant()&&$.Je(b,"font-variant",a.fontVariant()),a.fontWeight()&&$.Je(b,"font-weight",a.fontWeight()),a.letterSpacing()&&$.Je(b,"letter-spacing",a.letterSpacing()),
a.Nq()&&$.Je(b,"text-decoration",a.Nq()),a.opacity()&&(c.filter="alpha(opacity="+100*a.opacity()+")"),a.lineHeight()&&$.Je(b,"line-height",a.lineHeight()),a.textIndent()&&$.Je(b,"text-indent",a.textIndent()),"..."==a.textOverflow()&&$.Je(b,"text-overflow","ellipsis"),""==a.textOverflow()&&$.Je(b,"text-overflow","clip"),a.direction()&&$.Je(b,"direction",a.direction()),$.Je(b,"word-break",a.ut()),$.Je(b,"word-wrap",a.wordWrap()),null!=a.width()?$.Je(this.b,"white-space","normal"):$.Je(this.b,"white-space",
"nowrap"),a.xl()&&(b.style["text-align"]=a.G?"end"==a.xl()||"left"==a.xl()?"left":a.xl()==$.fh||"right"==a.xl()?"right":"center":"end"==a.xl()||"right"==a.xl()?"right":a.xl()==$.fh||"left"==a.xl()?"left":"center"),$.cf(b,!a.fm()),b.innerHTML=a.bd,this.gc(c,"width",String(a.width()?jO(a.width()):a.eb().width)),this.gc(c,"height",String(a.height()?jO(a.height()):a.eb().height)))};
$.g.pU=function(a){var b=a.da(),c=a.parent().path();if(c){var d=$.Vi();d.Jd($.Uf(c));a.o&&d.translate(a.Qp,a.f);a=c?$.Og(this,d,!0):"m "+kO(a.x)+","+kO(a.y)+" l "+(kO(a.x)+1)+","+kO(a.y)+" e";b.setAttribute("path",a)}};
$.g.qU=function(a){var b=a.parent(),c=b.style(),d=a.b,e=a.da();c=$.Cc(c);$.Ec(c,d);a=this.NC(a.text);c.fontStyle&&$.Je(a,"font-style",c.fontStyle);c.fontVariant&&$.Je(a,"font-variant",c.fontVariant);c.fontFamily&&$.Je(a,"font-family",c.fontFamily);c.fontSize&&$.Je(a,"font-size",c.fontSize);c.fontWeight&&$.Je(a,"font-weight",c.fontWeight);c.letterSpacing&&(a.style["v-text-spacing"]="normal"==c.letterSpacing?"":c.letterSpacing);c.decoration&&$.Je(a,"text-decoration",c.decoration);c.hAlign&&(a.style["v-text-align"]=
b.G?"end"==c.hAlign||"left"==c.hAlign?"left":c.hAlign==$.fh||"right"==c.hAlign?"right":"center":"end"==c.hAlign||"right"==c.hAlign?"right":c.hAlign==$.fh||"left"==c.hAlign?"left":"center");c.opacity&&(d=this.f("fill"),this.gc(d,"opacity",c.opacity),e.appendChild(d));e.appendChild(a);b.fm()?e.removeAttribute("unselectable"):this.gc(e,"unselectable","on");mO(this,e);e.setAttribute("filled","t");e.setAttribute("fillcolor",c.color);e.setAttribute("stroked","f");b.da().appendChild(e)};$.g.$Y=function(){return!0};
$.g.qV=function(a){var b=a.fill();$.K(b,$.Ib)&&(b="black");var c=a.stroke(),d;$.z(c)?d=c:d="keys"in c?0!=c.keys.length?c.keys[0].color:"#000":c.color;var e=!$.z(b)&&"keys"in b&&"cx"in b&&"cy"in b,f=!$.z(b)&&"keys"in b&&!e,h=!e&&!f,k="none"!=b&&"none"!=b.color,l="none"!=d&&0!=c.thickness,m=h&&k&&1!=b.opacity,p=!$.z(c)&&l&&(1!=c.opacity||"miter"!=c.lineJoin||"butt"!=c.lineCap||"none"!=c.dash);if(e||f||m||p){p=a.Da();m=p.Jo;var q=$.K(a,$.Vf)&&0==a.f.length?new $.J(0,0,1,1):a.eb();if(f){var r=$.K(b.mode,
$.J);var t=$.Ia(b.keys,0);0!=t[0].offset&&t.unshift({offset:0,color:t[0].color,opacity:t[0].opacity});var u=t[t.length-1];1!=u.offset&&t.push({offset:1,color:u.color,opacity:u.opacity});var v=b.mode?$.Hg(b.angle,q):b.angle;q=$.Yh(m,r?Zea(t,b.mode,v,q):t,b.opacity,v,b.mode)}else if(e){if(b.mode){var x=b.mode;u=Math.min(x.width,x.height);v=(b.cx*x.width-(q.left-x.left))/q.width;t=(b.cy*x.height-(q.top-x.top))/q.height;x=u/q.width;q=u/q.height}else v=b.cx,t=b.cy,x=q=1;q=bfa(m,b.keys,v,t,x,q,b.opacity,
b.mode)}else q=b;v=afa(m,q,c);if(!v.tn){x=this.f("shapetype");$.Jg(this,x,$.Vb($.Tb.td(),v));$.ne(m.da(),x);v.tn=!0;var w=null;if(f){var y=q;y.tn&&(y=new $.ki(y.keys,y.opacity,y.angle,y.mode),v.Dc=y);w=this.f("fill");t=y.keys;var B=[];(0,$.le)(t,function(a){B.push(a.offset+" "+a.color)},this);p=$.ab(y.angle+270);u=t[t.length-1];h=t[0];$.Ig(this,w,{type:"gradient",method:"none",colors:B.join(","),angle:p,color:h.color,opacity:r?y.opacity:(0,window.isNaN)(u.opacity)?y.opacity:u.opacity,color2:u.color,
"o:opacity2":r?y.opacity:(0,window.isNaN)(h.opacity)?y.opacity:h.opacity});x.appendChild(w);y.LC=m;y.tn=!0}else e?(r=q,r.tn&&(r=new dO(r.keys,r.zc,r.pc,r.b,r.f,r.opacity,r.nb),v.Dc=r),w=this.f("fill"),t=r.keys,h=t[t.length-1],u=t[0],$.Ig(this,w,{src:p.pathToRadialGradientImage,size:r.b+","+r.f,origin:".5, .5",position:r.zc+","+r.pc,type:"pattern",method:"linear sigma",colors:"0 "+h.color+";1 "+u.color,color:h.color,opacity:(0,window.isNaN)(h.opacity)?r.opacity:h.opacity,color2:u.color,"o:opacity2":(0,window.isNaN)(u.opacity)?
r.opacity:u.opacity}),x.appendChild(w),r.MC=m,r.tn=!0):h&&(w=v.oy?v.oy:v.oy=this.f("fill"),$.z(b)?($.Ig(this,a.da(),{fillcolor:b,filled:"none"!=b}),$.Ig(this,w,{type:"solid",on:"none"!=b,color:b,opacity:1})):($.Ig(this,a.da(),{fillcolor:b.color,filled:"none"!=b.color}),$.Ig(this,w,{type:"solid",on:"none"!=b.color,color:b.color,opacity:(0,window.isNaN)(b.opacity)?1:b.opacity})));x.appendChild(w);r=v.zG?v.zG:v.zG=this.f("stroke");m=c.thickness?c.thickness:1;p=(h=$ea(c.dash,m))?"flat":c.lineCap;$.Ig(this,
r,{joinstyle:c.lineJoin||"miter",endcap:"butt"==p?"flat":p,dashstyle:h,on:l,color:d,opacity:$.D(c)&&"opacity"in c?c.opacity:1,weight:m+"px"});x.appendChild(r)}if(e||f)h=q.keys[q.keys.length-1],$.Ig(this,a.da(),{fillcolor:h.color,filled:"none"!=h.color});$.Ig(this,a.da(),{filled:k,fillcolor:b.color||b,stroked:l,strokecolor:d,strokeweight:c.thickness?c.thickness+"px":"1px"});$.Ig(this,a.da(),{type:"#"+$.Vb($.Tb.td(),v)})}else $.Ig(this,a.da(),{type:"",filled:k,fillcolor:b.color||b,stroked:l,strokecolor:d,
strokeweight:c.thickness?c.thickness+"px":"1px"})};$.g.rU=function(a){var b=a.da().style;this.gc(b,"visibility",a.visible()?"":"hidden")};$.g.zz=function(a){var b=a.Ri(),c=a.Sf();if(c){var d;a.Fz?d=a.Fz:d=a.Fz=this.f("skew");a.pG||(a.da().appendChild(d),a.pG=!0);$.Ig(this,d,{on:"true",origin:[-.5-b.left/b.width,-.5-b.top/b.height].join(),matrix:[bO(c.Dd),bO(c.Pe),bO(c.Fe),bO(c.Ae),0,0].join()});$.Ig(this,a.da().style,{left:jO(b.left+c.Ed),top:jO(b.top+c.Fd)})}else a.pG&&($.re(a.Fz),a.pG=!1)};
$.g.r_=function(a){var b=a.da(),c=a.Fp(),d=a.Gp(),e=a.zq(),f=a.Mv();(a=a.Sf())&&!$.tb(a)?(c=$.ob(c,d,e,f,0,360,!1),d=c.length,a.transform(c,0,c,0,d/2),a=["m",kO(c[d-2]),kO(c[d-1]),"c"],$.Uc(Array.prototype.push,(0,$.Va)(c,kO),a)):a=["ae",kO(c),kO(d),kO(e),kO(f),0,-23592960];a.push("x");this.gc(b,"path",a.join(" "))};$.g.u_=function(a){var b=a.da().style;(a=a.Sf())&&this.gc(b,"rotation",String($.wb(a)))};$.g.x_=function(a){var b=a.da();(a=$.Og(this,a,!0))?this.gc(b,"path",a):b.removeAttribute("path")};
$.g.w_=$.ia;
$.g.A_=function(a){var b=a.Sf();if(b){var c=a.b,d=a.da().style;if(a.fq()){if(!a.path()){var e=a.Ra;a.b.length&&(e-=a.b[0].g);var f=a.P;$.Ig(this,d,{position:"absolute",overflow:"visible",left:jO(f+b.Ed),top:jO(e+b.Fd)})}if(uO(a))for(a=0,d=c.length;a<d;a++){var h=c[a];if(h.Fz){var k=h.Fz;$.Ig(this,k,{origin:[-.5-f,-.5-e].join(),matrix:[bO(b.Dd),bO(b.Pe),bO(b.Fe),bO(b.Ae),0,0].join()})}else k=h.Fz=this.f("skew");!h.pG&&h.da()&&(h.da().appendChild(k),h.pG=!0);var l=[-.5-f,-.5-e].join();h.da()&&(h.da().rotation=
0);$.Ig(this,k,{on:"true",origin:l,matrix:[bO(b.Dd),bO(b.Pe),bO(b.Fe),bO(b.Ae),0,0].join()})}}else f=a.x(),e=a.y(),a.vAlign()&&a.height()&&a.height()>a.D&&("middle"==a.vAlign()&&(e+=a.height()/2-a.D/2),"bottom"==a.vAlign()&&(e+=a.height()-a.D)),$.Ig(this,d,{position:"absolute",overflow:"hidden",left:jO(f+b.Ed),top:jO(e+b.Fd)})}};$.g.OF=function(){return!0};$.g.z_=$.ia;$.g.uW=$.ia;
$.g.JS=function(a){var b=$.K(a,$.ag),c=a.clip();if(c){c=c.shape();c=c.ts(c.od);c=c.clone();var d=a.da().style;if($.n(b)&&b)a=a.Sf(),c=$.ub(c,a);else if(!$.K(a,tO)||a.fq())c.left-=a.lj()||0,c.top-=a.Fy()||0;a=c.left;b=c.top;this.gc(d,"clip",["rect(",b+"px",a+c.width+"px",b+c.height+"px",a+"px",")"].join(" "))}else c=a.da().style,lO(c,"clip")};$.g.KR=function(){return!0};$.H(pO,$.Yc);$.g=pO.prototype;$.g.Sn=function(){return this.Dc};$.g.oy=null;$.g.zG=null;$.g.tn=!1;$.g.Rl=function(){return"shape-type"};$.g.R=function(){delete this.Dc;delete this.hc;$.re(this.oy);this.oy=null;$.re(this.zG);this.zG=null};$.H(rO,$.oi);rO.prototype.clear=function(){$.yc(this.g);$.yc(this.G);rO.B.clear.call(this)};rO.prototype.RZ=function(a){for(var b=$.ni(a.keys,a.zc,a.pc,a.b,a.f,a.opacity,a.nb),c=$.tc(this.g),d=0,e=c.length;d<e;d++){var f=c[d];f.Sn()==a&&qO(f)}$.vc(this.G,b)&&$.zc(this.G,b)};rO.prototype.QZ=function(a){for(var b=$.li(a.keys,a.opacity,a.angle,a.mode),c=$.tc(this.g),d=0,e=c.length;d<e;d++){var f=c[d];f.Sn()==a&&qO(f)}a=this.f;$.vc(a,b)&&$.zc(a,b)};
rO.prototype.R=function(){for(var a in this.g)$.Zc(this.g[a]);this.g=null;rO.B.R.call(this)};$.H(sO,$.zi);sO.prototype.XV=function(){return new rO(this)};sO.prototype.WV=function(a,b,c,d){return new cO(this,a,b,c,d)};$.G("acgraph.vml.Stage",sO);$.H(tO,$.gh);$.g=tO.prototype;$.g.textOverflow=function(a){a&&(this.ra=!0);return tO.B.textOverflow.call(this,a)};$.g.opacity=function(a){if(null!=a){if(a!==this.style().opacity){var b=!this.Da()||this.Da().Ne();b||this.Da().suspend();this.style().opacity=a;this.Hb(1024);this.Hb(32);this.Hb(16384);this.Hb(4);this.Fv();b||this.Da().resume()}return this}return this.style().opacity};
$.g.color=function(a){if(null!=a){if(a!==this.style().color){var b=!this.Da()||this.Da().Ne();b||this.Da().suspend();this.style().color=a;this.Hb(1024);this.Hb(32);this.Hb(16384);this.Hb(4);this.Fv();b||this.Da().resume()}return this}return this.style().color};$.g.Fv=function(){if($.Af().OF()){var a=this.Sf();a&&!$.tb(a)&&(this.Hb(4),this.lg=null)}};$.g.fq=function(){var a=this.Sf();return!(!a||a&&1==a.Dd&&0==a.Pe&&0==a.Fe&&1==a.Ae)||!!this.textOverflow()};
$.g.ts=function(a){this.ra=this.fq();return tO.B.ts.call(this,a)};$.g.Hd=function(){tO.B.Hd.call(this);if(uO(this)||this.textOverflow()){$.Af();var a=this.da();hO&&this.da()&&(a.innerHTML=a.innerHTML)}return this};$.g.tS=function(){$.yf(this,64)};$.g.$K=function(){this.ra?tO.B.$K.call(this):($.Af().SS(this),$.yf(this,16384))};$.g.oo=function(){this.ra?tO.B.oo.call(this):$.yf(this,32)};
$.g.Jz=function(){if(this.ra)tO.B.Jz.call(this);else{null!=this.direction()&&(this.G="rtl"==this.direction());var a=this.text();this.Vd||null==this.text()?this.bd=a:this.bd=$.ec(a);this.nb=this.Ul(this.bd,{})}};
$.g.Ul=function(a,b){if(this.ra)return tO.B.Ul.call(this,a,b);var c=$.Af(),d=this.style();c.Vm||c.Jp();c.b.style.cssText="";d.fontStyle&&$.Je(c.b,"font-style",d.fontStyle);d.fontVariant&&$.Je(c.b,"font-variant",d.fontVariant);d.fontFamily&&$.Je(c.b,"font-family",d.fontFamily);d.fontSize&&$.Je(c.b,"font-size",d.fontSize);d.fontWeight&&$.Je(c.b,"font-weight",d.fontWeight);d.letterSpacing&&$.Je(c.b,"letter-spacing",d.letterSpacing);d.decoration&&$.Je(c.b,"text-decoration",d.decoration);d.textIndent&&
$.Je(c.b,"text-indent",d.textIndent);$.Je(c.b,"word-break",d.wordBreak);$.Je(c.b,"word-wrap",d.wordWrap);null!=d.width||$.Je(c.b,"white-space","nowrap");d.width&&$.Je(c.b,"width",d.width);$.Je(c.Vm,{left:0,top:0,width:"1px",height:"1px"});$.Je(c.b,{border:"0 solid",position:"absolute",left:0,top:0});c.b.innerHTML=a;d=$.Ze(c.b);c.b.innerHTML="";d.left=this.x();d.top=this.y();this.D=d.height;this.height()&&(d.height=this.height());return d};
$.g.Kt=function(){var a=this.Sf();!a||this.gf(256)||this.gf(4)||(this.lg=a.clone())};$.g.Tw=function(){tO.B.Tw.call(this);vO(this)};$.g.tq=function(){tO.B.tq.call(this);vO(this);if(hO&&uO(this)){var a=!this.Da()||this.Da().Ne();a||this.Da().suspend();this.$=!1;this.Hb(1024);this.Hb(32);this.Hb(16384);this.Hb(4);this.Fv();a||this.Da().resume()}};$.g.R=function(){delete this.lg;tO.B.R.call(this)};var wO=tO.prototype;wO.color=wO.color;wO.opacity=wO.opacity;wO.textOverflow=wO.textOverflow;
$.G("acgraph.vml.Text",tO);$.G("acgraph.vml.getRenderer",function(){return iO.td()});}).call(this,$)}
