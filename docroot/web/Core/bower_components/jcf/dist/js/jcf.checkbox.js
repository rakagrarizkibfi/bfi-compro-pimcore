/*!
 * JavaScript Custom Forms : Checkbox Module
 *
 * Copyright 2014-2015 PSD2HTML - http://psd2html.com/jcf
 * Released under the MIT license (LICENSE.txt)
 *
 * Version: 1.2.3
 */
!function(e){e.addModule(function(e){"use strict";return{name:"Checkbox",selector:'input[type="checkbox"]',options:{wrapNative:!0,checkedClass:"jcf-checked",uncheckedClass:"jcf-unchecked",labelActiveClass:"jcf-label-active",fakeStructure:'<span class="jcf-checkbox"><span></span></span>'},matchElement:function(e){return e.is(":checkbox")},init:function(){this.initStructure(),this.attachEvents(),this.refresh()},initStructure:function(){this.doc=e(document),this.realElement=e(this.options.element),this.fakeElement=e(this.options.fakeStructure).insertAfter(this.realElement),this.labelElement=this.getLabelFor(),this.options.wrapNative?this.realElement.appendTo(this.fakeElement).css({position:"absolute",height:"100%",width:"100%",opacity:0,margin:0}):this.realElement.addClass(this.options.hiddenClass)},attachEvents:function(){this.realElement.on({focus:this.onFocus,click:this.onRealClick}),this.fakeElement.on("click",this.onFakeClick),this.fakeElement.on("jcf-pointerdown",this.onPress)},onRealClick:function(e){var t=this;this.savedEventObject=e,setTimeout(function(){t.refresh()},0)},onFakeClick:function(e){this.options.wrapNative&&this.realElement.is(e.target)||this.realElement.is(":disabled")||(delete this.savedEventObject,this.stateChecked=this.realElement.prop("checked"),this.realElement.prop("checked",!this.stateChecked),this.fireNativeEvent(this.realElement,"click"),this.savedEventObject&&this.savedEventObject.isDefaultPrevented()?this.realElement.prop("checked",this.stateChecked):this.fireNativeEvent(this.realElement,"change"),delete this.savedEventObject)},onFocus:function(){this.pressedFlag&&this.focusedFlag||(this.focusedFlag=!0,this.fakeElement.addClass(this.options.focusClass),this.realElement.on("blur",this.onBlur))},onBlur:function(){this.pressedFlag||(this.focusedFlag=!1,this.fakeElement.removeClass(this.options.focusClass),this.realElement.off("blur",this.onBlur))},onPress:function(e){this.focusedFlag||"mouse"!==e.pointerType||this.realElement.focus(),this.pressedFlag=!0,this.fakeElement.addClass(this.options.pressedClass),this.doc.on("jcf-pointerup",this.onRelease)},onRelease:function(e){this.focusedFlag&&"mouse"===e.pointerType&&this.realElement.focus(),this.pressedFlag=!1,this.fakeElement.removeClass(this.options.pressedClass),this.doc.off("jcf-pointerup",this.onRelease)},getLabelFor:function(){var t=this.realElement.closest("label"),s=this.realElement.prop("id");return!t.length&&s&&(t=e('label[for="'+s+'"]')),t.length?t:null},refresh:function(){var e=this.realElement.is(":checked"),t=this.realElement.is(":disabled");this.fakeElement.toggleClass(this.options.checkedClass,e).toggleClass(this.options.uncheckedClass,!e).toggleClass(this.options.disabledClass,t),this.labelElement&&this.labelElement.toggleClass(this.options.labelActiveClass,e)},destroy:function(){this.options.wrapNative?this.realElement.insertBefore(this.fakeElement).css({position:"",width:"",height:"",opacity:"",margin:""}):this.realElement.removeClass(this.options.hiddenClass),this.fakeElement.off("jcf-pointerdown",this.onPress),this.fakeElement.remove(),this.doc.off("jcf-pointerup",this.onRelease),this.realElement.off({focus:this.onFocus,click:this.onRealClick})}}})}(jcf);