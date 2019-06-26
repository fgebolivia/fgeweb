/* jce - 2.6.31 | 2018-06-21 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2018 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){function ucfirst(s){return s.substring(0,1).toUpperCase()+s.substring(1)}var DOM=tinymce.DOM,Event=tinymce.dom.Event,extend=tinymce.extend;tinymce.create("tinymce.plugins.SourcePlugin",{init:function(ed,url){var self=this;self.editor=ed,ed.plugins.fullscreen&&(ed.onFullScreen.add(function(ed,state){var element=ed.getElement(),header=(element.parentNode,DOM.getPrev(element,".wf-editor-header")),iframe=DOM.get(ed.id+"_editor_source_iframe");if(state){ed.settings.container_height||(ed.settings.container_height=iframe.clientHeight);var vp=DOM.getViewPort();DOM.setStyle(iframe,"height",vp.h-header.offsetHeight-30),DOM.setStyle(iframe,"max-width","100%")}else DOM.setStyle(iframe,"height",ed.settings.container_height-30),DOM.setStyle(iframe,"max-width",ed.settings.container_width||"100%");if(iframe){var editor=iframe.contentWindow.SourceEditor,w=iframe.clientWidth,h=iframe.clientHeight;editor.resize(w,h)}}),ed.onFullScreenResize.add(function(ed,vp){var element=ed.getElement(),header=DOM.getPrev(element,".wf-editor-header"),iframe=DOM.get(ed.id+"_editor_source_iframe");DOM.setStyle(iframe,"height",vp.h-header.offsetHeight-30)})),ed.onSetContent.add(function(ed,o){self.setContent(o.content,!0)}),ed.onInit.add(function(ed){var activeTab=sessionStorage.getItem("wf-editor-tabs-"+ed.id)||ed.settings.active_tab||"";"wf-editor-source"===activeTab&&(DOM.hide(ed.getContainer()),DOM.hide(ed.getElement()),self.toggle())})},setContent:function(v){var ed=this.editor,iframe=DOM.get(ed.id+"_editor_source_iframe");if(iframe){var editor=iframe.contentWindow.SourceEditor;if(editor)return editor.setContent(v)}return!1},insertContent:function(v){var ed=this.editor,iframe=DOM.get(ed.id+"_editor_source_iframe");if(iframe){var editor=iframe.contentWindow.SourceEditor;if(editor)return editor.insertContent(v)}return!1},getContent:function(){var ed=this.editor,iframe=DOM.get(ed.id+"_editor_source_iframe");if(iframe&&!DOM.isHidden(ed.id+"_editor_source")){var editor=iframe.contentWindow.SourceEditor;if(editor)return editor.getContent()}return null},hide:function(){DOM.hide(this.editor.id+"_editor_source")},save:function(content,debounced){var ed=this.editor,el=ed.getElement();content=tinymce.is(content)?content:this.getContent();var args={no_events:!0,format:"raw"},settings={};if(extend(settings,ed.settings),args.content=content,settings.source_validate_content!==!1){args.format="html",args.source=!0,ed.onBeforeSetContent.dispatch(ed,args),settings.verify_html=!1,settings.forced_root_block=!1,settings.validate=!0;var parser=new tinymce.html.DomParser(settings,ed.schema),serializer=new tinymce.html.Serializer(settings,ed.schema);args.content=serializer.serialize(parser.parse(args.content),args),args.get=!0,ed.onPostProcess.dispatch(ed,args),content=args.content}return/TEXTAREA|INPUT/i.test(el.nodeName)?el.value=content:el.innerHTML=content,debounced&&(args.content=content,ed.onWfEditorChange.dispatch(ed,args)),content},toggle:function(){var ed=this.editor,s=ed.settings,element=ed.getElement(),container=element.parentNode,header=DOM.getPrev(element,".wf-editor-header"),div=DOM.get(ed.id+"_editor_source"),iframe=DOM.get(ed.id+"_editor_source_iframe"),statusbar=DOM.get(ed.id+"_editor_source_resize"),ifrHeight=parseInt(DOM.get(ed.id+"_ifr").style.height)||s.height,o=tinymce.util.Cookie.getHash("TinyMCE_"+ed.id+"_size");o&&o.height&&(ifrHeight=o.height);var content=tinymce.is(element.value)?element.value:element.innerHTML;if(div){DOM.show(div);var editor=iframe.contentWindow.SourceEditor,w=iframe.clientWidth,h=iframe.clientHeight;editor.resize(w,h),editor.setButtonState("fullscreen",DOM.hasClass(container,"mce-fullscreen")),editor.setContent(content,!0),DOM.removeClass(container,"mce-loading")}else{var div=DOM.add(container,"div",{role:"textbox",id:ed.id+"_editor_source",class:"wf-editor-source defaultSkin"});"default"!==s.skin&&(DOM.addClass(div,s.skin+"Skin"),s.skin_variant&&DOM.addClass(div,s.skin+"Skin"+ucfirst(s.skin_variant)));var query=ed.getParam("site_url")+"index.php?option=com_jce",args={view:"editor",layout:"plugin",plugin:"source",context:ed.getParam("context")};args[ed.settings.token]=1;for(k in args)query+="&"+k+"="+encodeURIComponent(args[k]);var iframe=DOM.create("iframe",{frameborder:0,scrolling:"no",id:ed.id+"_editor_source_iframe",src:query});Event.add(iframe,"load",function(){var editor=iframe.contentWindow.SourceEditor,w=iframe.clientWidth,h=iframe.clientHeight;editor.init({wrap:ed.getParam("source_wrap",!0),linenumbers:ed.getParam("source_numbers",!0),highlight:ed.getParam("source_highlight",!0),theme:ed.getParam("source_theme","textmate"),format:ed.getParam("source_format",!0),tag_closing:ed.getParam("source_tag_closing",!0),selection_match:ed.getParam("source_selection_match",!0),font_size:ed.getParam("source_font_size",""),fullscreen:DOM.hasClass(container,"mce-fullscreen"),load:function(){DOM.removeClass(container,"mce-loading"),editor.resize(w,h)},editor:ed},content)});var iframeContainer=DOM.add(div,"div",{class:"mceIframeContainer"});DOM.add(iframeContainer,iframe),statusbar=DOM.add(div,"div",{id:ed.id+"_editor_source_statusbar",class:"mceStatusbar mceLast"},'<a tabindex="-1" class="mceResize" onclick="return false;" href="javascript:;" id="'+ed.id+'_editor_source_resize"></a>');var resize=DOM.get(ed.id+"_editor_source_resize");Event.add(resize,"click",function(e){e.preventDefault()}),Event.add(resize,"mousedown",function(e){function resizeTo(w,h){w=Math.max(w,300),h=Math.max(h,200),iframe.style.maxWidth=w+"px",iframe.style.height=h+"px",container.style.maxWidth=w+"px",editor.resize(w,h),ed.settings.container_width=w,ed.settings.container_height=h+statusbar.offsetHeight,h-=ed.settings.interface_height||0,ed.theme.resizeTo(w,h)}function resizeOnMove(e){e.preventDefault(),w=sw+(e.screenX-sx),h=sh+(e.screenY-sy),resizeTo(w,h),DOM.addClass(resize,"wf-editor-source-resizing")}function endResize(e){e.preventDefault(),Event.remove(DOM.doc,"mousemove",mm1),Event.remove(DOM.doc,"mouseup",mu1),Event.remove(ifrDoc,"mousemove",mm2),Event.remove(ifrDoc,"mouseup",mu2),w=sw+(e.screenX-sx),h=sh+(e.screenY-sy),resizeTo(w,h),DOM.removeClass(resize,"wf-editor-source-resizing")}var sx,sy,sw,sh,w,h,ifrDoc=iframe.contentWindow.document,editor=iframe.contentWindow.SourceEditor;return e.preventDefault(),DOM.hasClass(resize,"wf-editor-source-resizing")?(endResize(e),!1):(sx=e.screenX,sy=e.screenY,sw=w=container.offsetWidth,sh=h=iframe.clientHeight,mm1=Event.add(DOM.doc,"mousemove",resizeOnMove),mu1=Event.add(DOM.doc,"mouseup",endResize),mm2=Event.add(ifrDoc,"mousemove",resizeOnMove),void(mu2=Event.add(ifrDoc,"mouseup",endResize)))})}var height=ed.settings.container_height||sessionStorage.getItem("wf-editor-container-height")||ifrHeight+statusbar.offsetHeight,width=ed.settings.container_width||sessionStorage.getItem("wf-editor-container-width");if(DOM.hasClass(container,"mce-fullscreen")){var vp=DOM.getViewPort();height=vp.h-header.offsetHeight}DOM.setStyle(iframe,"height",height-statusbar.offsetHeight);var editor=iframe.contentWindow.SourceEditor;editor&&editor.resize(width,height-statusbar.offsetHeight)}}),tinymce.PluginManager.add("source",tinymce.plugins.SourcePlugin)}();