/**
 * Copyright (c) 2009 - 2010 Chris Leonello
 * jqPlot is currently available for use in all personal or commercial projects 
 * under both the MIT (http://www.opensource.org/licenses/mit-license.php) and GPL 
 * version 2.0 (http://www.gnu.org/licenses/gpl-2.0.html) licenses. This means that you can 
 * choose the license that best suits your project and use it accordingly. 
 *
 * Although not required, the author would appreciate an email letting him 
 * know of any substantial use of jqPlot.  You can reach the author at: 
 * chris at jqplot  or see http://www.jqplot.com/info.php .
 *
 * If you are feeling kind and generous, consider supporting the project by
 * making a donation at: http://www.jqplot.com/donate.php .
 *
 * jqPlot includes date instance methods and printf/sprintf functions by other authors:
 *
 * Date instance methods contained in jqplot.dateMethods.js:
 *
 *     author Ken Snyder (ken d snyder at gmail dot com)
 *     date 2008-09-10
 *     version 2.0.2 (http://kendsnyder.com/sandbox/date/)     
 *     license Creative Commons Attribution License 3.0 (http://creativecommons.org/licenses/by/3.0/)
 *
 * JavaScript printf/sprintf functions contained in jqplot.sprintf.js:
 *
 *     version 2007.04.27
 *     author Ash Searle
 *     http://hexmen.com/blog/2007/03/printf-sprintf/
 *     http://hexmen.com/js/sprintf.js
 *     The author (Ash Searle) has placed this code in the public domain:
 *     "This code is unrestricted: you are free to use it however you like."
 * 
 */
(function(e){e.jqplot.PieRenderer=function(){e.jqplot.LineRenderer.call(this)};e.jqplot.PieRenderer.prototype=new e.jqplot.LineRenderer();e.jqplot.PieRenderer.prototype.constructor=e.jqplot.PieRenderer;e.jqplot.PieRenderer.prototype.init=function(p,t){this.diameter=null;this.padding=20;this.sliceMargin=0;this.fill=true;this.shadowOffset=2;this.shadowAlpha=0.07;this.shadowDepth=5;this.highlightMouseOver=true;this.highlightMouseDown=false;this.highlightColors=[];this.dataLabels="percent";this.showDataLabels=false;this.dataLabelFormatString=null;this.dataLabelThreshold=3;this.dataLabelPositionFactor=0.52;this.dataLabelNudge=2;this.dataLabelCenterOn=true;this.startAngle=0;this.tickRenderer=e.jqplot.PieTickRenderer;this._drawData=true;if(p.highlightMouseDown&&p.highlightMouseOver==null){p.highlightMouseOver=false}e.extend(true,this,p);if(this.diameter!=null){this.diameter=this.diameter-this.sliceMargin}this._diameter=null;this._radius=null;this._sliceAngles=[];this._highlightedPoint=null;if(this.highlightColors.length==0){for(var r=0;r<this.seriesColors.length;r++){var q=e.jqplot.getColorComponents(this.seriesColors[r]);var n=[q[0],q[1],q[2]];var s=n[0]+n[1]+n[2];for(var o=0;o<3;o++){n[o]=(s>570)?n[o]*0.8:n[o]+0.3*(255-n[o]);n[o]=parseInt(n[o],10)}this.highlightColors.push("rgb("+n[0]+","+n[1]+","+n[2]+")")}}this.highlightColorGenerator=new e.jqplot.ColorGenerator(this.highlightColors);t.postParseOptionsHooks.addOnce(l);t.postInitHooks.addOnce(g);t.eventListenerHooks.addOnce("jqplotMouseMove",a);t.eventListenerHooks.addOnce("jqplotMouseDown",b);t.eventListenerHooks.addOnce("jqplotMouseUp",k);t.eventListenerHooks.addOnce("jqplotClick",f);t.eventListenerHooks.addOnce("jqplotRightClick",m);t.postDrawHooks.addOnce(h)};e.jqplot.PieRenderer.prototype.setGridData=function(s){var o=[];var t=[];var n=this.startAngle/180*Math.PI;var r=0;this._drawData=false;for(var q=0;q<this.data.length;q++){if(this.data[q][1]!=0){this._drawData=true}o.push(this.data[q][1]);t.push([this.data[q][0]]);if(q>0){o[q]+=o[q-1]}r+=this.data[q][1]}var p=Math.PI*2/o[o.length-1];for(var q=0;q<o.length;q++){t[q][1]=o[q]*p;t[q][2]=this.data[q][1]/r}this.gridData=t};e.jqplot.PieRenderer.prototype.makeGridData=function(s,t){var o=[];var u=[];var r=0;var n=this.startAngle/180*Math.PI;this._drawData=false;for(var q=0;q<s.length;q++){if(this.data[q][1]!=0){this._drawData=true}o.push(s[q][1]);u.push([s[q][0]]);if(q>0){o[q]+=o[q-1]}r+=s[q][1]}var p=Math.PI*2/o[o.length-1];for(var q=0;q<o.length;q++){u[q][1]=o[q]*p;u[q][2]=s[q][1]/r}return u};e.jqplot.PieRenderer.prototype.drawSlice=function(x,v,u,p,s){if(this._drawData){var n=this._diameter/2;var w=this.fill;var t=this.lineWidth;x.save();x.translate(this._center[0],this._center[1]);x.translate(this.sliceMargin*Math.cos((v+u)/2),this.sliceMargin*Math.sin((v+u)/2));if(s){for(var q=0;q<this.shadowDepth;q++){x.save();x.translate(this.shadowOffset*Math.cos(this.shadowAngle/180*Math.PI),this.shadowOffset*Math.sin(this.shadowAngle/180*Math.PI));o()}}else{o()}}function o(){if(u>6.282+this.startAngle){u=6.282+this.startAngle;if(v>u){v=6.281+this.startAngle}}if(v>=u){return}x.beginPath();x.fillStyle=p;x.strokeStyle=p;x.lineWidth=t;x.arc(0,0,n,v,u,false);x.lineTo(0,0);x.closePath();if(w){x.fill()}else{x.stroke()}}if(s){for(var q=0;q<this.shadowDepth;q++){x.restore()}}x.restore()};e.jqplot.PieRenderer.prototype.draw=function(N,V,u,P){var Q;var K=(u!=undefined)?u:{};var s=0;var q=0;var v=1;var n=new e.jqplot.ColorGenerator(this.seriesColors);if(u.legendInfo&&u.legendInfo.placement=="insideGrid"){var J=u.legendInfo;switch(J.location){case"nw":s=J.width+J.xoffset;break;case"w":s=J.width+J.xoffset;break;case"sw":s=J.width+J.xoffset;break;case"ne":s=J.width+J.xoffset;v=-1;break;case"e":s=J.width+J.xoffset;v=-1;break;case"se":s=J.width+J.xoffset;v=-1;break;case"n":q=J.height+J.yoffset;break;case"s":q=J.height+J.yoffset;v=-1;break;default:break}}var C=(K.shadow!=undefined)?K.shadow:this.shadow;var W=(K.showLine!=undefined)?K.showLine:this.showLine;var O=(K.fill!=undefined)?K.fill:this.fill;var t=N.canvas.width;var I=N.canvas.height;var H=t-s-2*this.padding;var R=I-q-2*this.padding;var z=Math.min(H,R);var T=z;this._diameter=this.diameter||T-this.sliceMargin;var L=this._radius=this._diameter/2;var p=this.startAngle/180*Math.PI;this._center=[(t-v*s)/2+v*s,(I-v*q)/2+v*q];if(this.shadow){var M="rgba(0,0,0,"+this.shadowAlpha+")";for(var Q=0;Q<V.length;Q++){var B=(Q==0)?p:V[Q-1][1]+p;B+=this.sliceMargin/180*Math.PI;this.renderer.drawSlice.call(this,N,B,V[Q][1]+p,M,true)}}for(var Q=0;Q<V.length;Q++){var B=(Q==0)?p:V[Q-1][1]+p;B+=this.sliceMargin/180*Math.PI;var A=V[Q][1]+p;this._sliceAngles.push([B,A]);this.renderer.drawSlice.call(this,N,B,A,n.next(),false);if(this.showDataLabels&&V[Q][2]*100>=this.dataLabelThreshold){var S,U=(B+A)/2,D;if(this.dataLabels=="label"){S=this.dataLabelFormatString||"%s";D=e.jqplot.sprintf(S,V[Q][0])}else{if(this.dataLabels=="value"){S=this.dataLabelFormatString||"%d";D=e.jqplot.sprintf(S,this.data[Q][1])}else{if(this.dataLabels=="percent"){S=this.dataLabelFormatString||"%d%%";D=e.jqplot.sprintf(S,V[Q][2]*100)}else{if(this.dataLabels.constructor==Array){S=this.dataLabelFormatString||"%s";D=e.jqplot.sprintf(S,this.dataLabels[Q])}}}}var o=(this._radius)*this.dataLabelPositionFactor+this.sliceMargin+this.dataLabelNudge;var G=this._center[0]+Math.cos(U)*o+this.canvas._offsets.left;var F=this._center[1]+Math.sin(U)*o+this.canvas._offsets.top;var E=e('<div class="jqplot-pie-series jqplot-data-label" style="position:absolute;">'+D+"</div>").insertBefore(P.eventCanvas._elem);if(this.dataLabelCenterOn){G-=E.width()/2;F-=E.height()/2}else{G-=E.width()*Math.sin(U/2);F-=E.height()/2}G=Math.round(G);F=Math.round(F);E.css({left:G,top:F})}}};e.jqplot.PieAxisRenderer=function(){e.jqplot.LinearAxisRenderer.call(this)};e.jqplot.PieAxisRenderer.prototype=new e.jqplot.LinearAxisRenderer();e.jqplot.PieAxisRenderer.prototype.constructor=e.jqplot.PieAxisRenderer;e.jqplot.PieAxisRenderer.prototype.init=function(n){this.tickRenderer=e.jqplot.PieTickRenderer;e.extend(true,this,n);this._dataBounds={min:0,max:100};this.min=0;this.max=100;this.showTicks=false;this.ticks=[];this.showMark=false;this.show=false};e.jqplot.PieLegendRenderer=function(){e.jqplot.TableLegendRenderer.call(this)};e.jqplot.PieLegendRenderer.prototype=new e.jqplot.TableLegendRenderer();e.jqplot.PieLegendRenderer.prototype.constructor=e.jqplot.PieLegendRenderer;e.jqplot.PieLegendRenderer.prototype.init=function(n){this.numberRows=null;this.numberColumns=null;e.extend(true,this,n)};e.jqplot.PieLegendRenderer.prototype.draw=function(){var q=this;if(this.show){var y=this._series;var B="position:absolute;";B+=(this.background)?"background:"+this.background+";":"";B+=(this.border)?"border:"+this.border+";":"";B+=(this.fontSize)?"font-size:"+this.fontSize+";":"";B+=(this.fontFamily)?"font-family:"+this.fontFamily+";":"";B+=(this.textColor)?"color:"+this.textColor+";":"";B+=(this.marginTop!=null)?"margin-top:"+this.marginTop+";":"";B+=(this.marginBottom!=null)?"margin-bottom:"+this.marginBottom+";":"";B+=(this.marginLeft!=null)?"margin-left:"+this.marginLeft+";":"";B+=(this.marginRight!=null)?"margin-right:"+this.marginRight+";":"";this._elem=e('<table class="jqplot-table-legend" style="'+B+'"></table>');var F=false,x=false,n,v;var z=y[0];var o=new e.jqplot.ColorGenerator(z.seriesColors);if(z.show){var G=z.data;if(this.numberRows){n=this.numberRows;if(!this.numberColumns){v=Math.ceil(G.length/n)}else{v=this.numberColumns}}else{if(this.numberColumns){v=this.numberColumns;n=Math.ceil(G.length/this.numberColumns)}else{n=G.length;v=1}}var E,D,p,t,r,u,w,C;var A=0;for(E=0;E<n;E++){if(x){p=e('<tr class="jqplot-table-legend"></tr>').prependTo(this._elem)}else{p=e('<tr class="jqplot-table-legend"></tr>').appendTo(this._elem)}for(D=0;D<v;D++){if(A<G.length){u=this.labels[A]||G[A][0].toString();C=o.next();if(!x){if(E>0){F=true}else{F=false}}else{if(E==n-1){F=false}else{F=true}}w=(F)?this.rowSpacing:"0";t=e('<td class="jqplot-table-legend" style="text-align:center;padding-top:'+w+';"><div><div class="jqplot-table-legend-swatch" style="border-color:'+C+';"></div></div></td>');r=e('<td class="jqplot-table-legend" style="padding-top:'+w+';"></td>');if(this.escapeHtml){r.text(u)}else{r.html(u)}if(x){r.prependTo(p);t.prependTo(p)}else{t.appendTo(p);r.appendTo(p)}F=true}A++}}}}return this._elem};e.jqplot.PieRenderer.prototype.handleMove=function(p,o,s,r,q){if(r){var n=[r.seriesIndex,r.pointIndex,r.data];q.target.trigger("jqplotDataMouseOver",n);if(q.series[n[0]].highlightMouseOver&&!(n[0]==q.plugins.pieRenderer.highlightedSeriesIndex&&n[1]==q.series[n[0]]._highlightedPoint)){q.target.trigger("jqplotDataHighlight",n);d(q,n[0],n[1])}}else{if(r==null){j(q)}}};function c(r,q,o){o=o||{};o.axesDefaults=o.axesDefaults||{};o.legend=o.legend||{};o.seriesDefaults=o.seriesDefaults||{};var n=false;if(o.seriesDefaults.renderer==e.jqplot.PieRenderer){n=true}else{if(o.series){for(var p=0;p<o.series.length;p++){if(o.series[p].renderer==e.jqplot.PieRenderer){n=true}}}}if(n){o.axesDefaults.renderer=e.jqplot.PieAxisRenderer;o.legend.renderer=e.jqplot.PieLegendRenderer;o.legend.preDraw=true;o.seriesDefaults.pointLabels={show:false}}}function g(p,o,n){for(i=0;i<this.series.length;i++){if(this.series[i].renderer.constructor==e.jqplot.PieRenderer){if(this.series[i].highlightMouseOver){this.series[i].highlightMouseDown=false}}}this.target.bind("mouseout",{plot:this},function(q){j(q.data.plot)})}function l(n){for(var o=0;o<this.series.length;o++){this.series[o].seriesColors=this.seriesColors;this.series[o].colorGenerator=this.colorGenerator}}function d(r,q,p){var o=r.series[q];var n=r.plugins.pieRenderer.highlightCanvas;n._ctx.clearRect(0,0,n._ctx.canvas.width,n._ctx.canvas.height);o._highlightedPoint=p;r.plugins.pieRenderer.highlightedSeriesIndex=q;o.renderer.drawSlice.call(o,n._ctx,o._sliceAngles[p][0],o._sliceAngles[p][1],o.highlightColorGenerator.get(p),false)}function j(p){var n=p.plugins.pieRenderer.highlightCanvas;n._ctx.clearRect(0,0,n._ctx.canvas.width,n._ctx.canvas.height);for(var o=0;o<p.series.length;o++){p.series[o]._highlightedPoint=null}p.plugins.pieRenderer.highlightedSeriesIndex=null;p.target.trigger("jqplotDataUnhighlight")}function a(r,q,u,t,s){if(t){var p=[t.seriesIndex,t.pointIndex,t.data];var o=jQuery.Event("jqplotDataMouseOver");o.pageX=r.pageX;o.pageY=r.pageY;s.target.trigger(o,p);if(s.series[p[0]].highlightMouseOver&&!(p[0]==s.plugins.pieRenderer.highlightedSeriesIndex&&p[1]==s.series[p[0]]._highlightedPoint)){var n=jQuery.Event("jqplotDataHighlight");n.pageX=r.pageX;n.pageY=r.pageY;s.target.trigger(n,p);d(s,p[0],p[1])}}else{if(t==null){j(s)}}}function b(q,p,t,s,r){if(s){var o=[s.seriesIndex,s.pointIndex,s.data];if(r.series[o[0]].highlightMouseDown&&!(o[0]==r.plugins.pieRenderer.highlightedSeriesIndex&&o[1]==r.series[o[0]]._highlightedPoint)){var n=jQuery.Event("jqplotDataHighlight");n.pageX=q.pageX;n.pageY=q.pageY;r.target.trigger(n,o);d(r,o[0],o[1])}}else{if(s==null){j(r)}}}function k(p,o,s,r,q){var n=q.plugins.pieRenderer.highlightedSeriesIndex;if(n!=null&&q.series[n].highlightMouseDown){j(q)}}function f(q,p,t,s,r){if(s){var o=[s.seriesIndex,s.pointIndex,s.data];var n=jQuery.Event("jqplotDataClick");n.pageX=q.pageX;n.pageY=q.pageY;r.target.trigger(n,o)}}function m(r,q,u,t,s){if(t){var p=[t.seriesIndex,t.pointIndex,t.data];var n=s.plugins.pieRenderer.highlightedSeriesIndex;if(n!=null&&s.series[n].highlightMouseDown){j(s)}var o=jQuery.Event("jqplotDataRightClick");o.pageX=r.pageX;o.pageY=r.pageY;s.target.trigger(o,p)}}function h(){this.plugins.pieRenderer={highlightedSeriesIndex:null};this.plugins.pieRenderer.highlightCanvas=new e.jqplot.GenericCanvas();var o=e(this.targetId+" .jqplot-data-label");if(o.length){e(o[0]).before(this.plugins.pieRenderer.highlightCanvas.createElement(this._gridPadding,"jqplot-pieRenderer-highlight-canvas",this._plotDimensions))}else{this.eventCanvas._elem.before(this.plugins.pieRenderer.highlightCanvas.createElement(this._gridPadding,"jqplot-pieRenderer-highlight-canvas",this._plotDimensions))}var n=this.plugins.pieRenderer.highlightCanvas.setContext()}e.jqplot.preInitHooks.push(c);e.jqplot.PieTickRenderer=function(){e.jqplot.AxisTickRenderer.call(this)};e.jqplot.PieTickRenderer.prototype=new e.jqplot.AxisTickRenderer();e.jqplot.PieTickRenderer.prototype.constructor=e.jqplot.PieTickRenderer})(jQuery);