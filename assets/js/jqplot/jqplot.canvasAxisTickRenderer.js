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
(function(a){a.jqplot.CanvasAxisTickRenderer=function(b){this.mark="outside";this.showMark=true;this.showGridline=true;this.isMinorTick=false;this.angle=0;this.markSize=4;this.show=true;this.showLabel=true;this.labelPosition="auto";this.label="";this.value=null;this._styles={};this.formatter=a.jqplot.DefaultTickFormatter;this.formatString="";this.prefix="";this.fontFamily='"Trebuchet MS", Arial, Helvetica, sans-serif';this.fontSize="10pt";this.fontWeight="normal";this.fontStretch=1;this.textColor="#666666";this.enableFontSupport=true;this.pt2px=null;this._elem;this._ctx;this._plotWidth;this._plotHeight;this._plotDimensions={height:null,width:null};a.extend(true,this,b);var c={fontSize:this.fontSize,fontWeight:this.fontWeight,fontStretch:this.fontStretch,fillStyle:this.textColor,angle:this.getAngleRad(),fontFamily:this.fontFamily};if(this.pt2px){c.pt2px=this.pt2px}if(this.enableFontSupport){function d(){return !!(document.createElement("canvas").getContext&&typeof document.createElement("canvas").getContext("2d").fillText=="function")}if(d()){this._textRenderer=new a.jqplot.CanvasFontRenderer(c)}else{this._textRenderer=new a.jqplot.CanvasTextRenderer(c)}}else{this._textRenderer=new a.jqplot.CanvasTextRenderer(c)}};a.jqplot.CanvasAxisTickRenderer.prototype.init=function(b){a.extend(true,this,b);this._textRenderer.init({fontSize:this.fontSize,fontWeight:this.fontWeight,fontStretch:this.fontStretch,fillStyle:this.textColor,angle:this.getAngleRad(),fontFamily:this.fontFamily})};a.jqplot.CanvasAxisTickRenderer.prototype.getWidth=function(d){if(this._elem){return this._elem.outerWidth(true)}else{var f=this._textRenderer;var c=f.getWidth(d);var e=f.getHeight(d);var b=Math.abs(Math.sin(f.angle)*e)+Math.abs(Math.cos(f.angle)*c);return b}};a.jqplot.CanvasAxisTickRenderer.prototype.getHeight=function(d){if(this._elem){return this._elem.outerHeight(true)}else{var f=this._textRenderer;var c=f.getWidth(d);var e=f.getHeight(d);var b=Math.abs(Math.cos(f.angle)*e)+Math.abs(Math.sin(f.angle)*c);return b}};a.jqplot.CanvasAxisTickRenderer.prototype.getAngleRad=function(){var b=this.angle*Math.PI/180;return b};a.jqplot.CanvasAxisTickRenderer.prototype.setTick=function(b,d,c){this.value=b;if(c){this.isMinorTick=true}return this};a.jqplot.CanvasAxisTickRenderer.prototype.draw=function(c){if(!this.label){this.label=this.formatter(this.formatString,this.value)}if(this.prefix&&!this.formatString){this.label=this.prefix+this.label}var e=document.createElement("canvas");this._textRenderer.setText(this.label,c);var b=this.getWidth(c);var d=this.getHeight(c);e.width=b;e.height=d;e.style.width=b;e.style.height=d;e.style.textAlign="left";e.style.position="absolute";this._domelem=e;this._elem=a(e);this._elem.css(this._styles);this._elem.addClass("jqplot-"+this.axis+"-tick");return this._elem};a.jqplot.CanvasAxisTickRenderer.prototype.pack=function(){if(a.jqplot.use_excanvas){window.G_vmlCanvasManager.init_(document);this._domelem=window.G_vmlCanvasManager.initElement(this._domelem)}var b=this._elem.get(0).getContext("2d");this._textRenderer.draw(b,this.label)}})(jQuery);