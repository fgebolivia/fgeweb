/* jce - 2.6.31 | 2018-06-21 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2018 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
var TemplateManager={settings:{},preInit:function(){tinyMCEPopup.requireLangPack()},templateHTML:null,init:function(){var self=this;$("button#insert").click(function(e){self.insert(),e.preventDefault()});var ed=tinyMCEPopup.editor,s=ed.selection,n=s.getNode(),src=ed.convertURL(ed.dom.getAttrib(n,"src"));$(document.body).append('<input type="hidden" id="src" value="'+src+'" />'),Wf.init(),$("#src").filebrowser().on("filebrowser:onfileclick",function(e,file){self.selectFile(file)}).on("filebrowser:createtemplate",function(e,file){self.createTemplate()}),$("#insert").prop("disabled",!0)},insert:function(){tinyMCEPopup.execCommand("mceInsertTemplate",!1,{content:this.getHTML(),selection:tinyMCEPopup.editor.selection.getContent()}),tinyMCEPopup.close()},getHTML:function(){return this.templateHTML},setHTML:function(h){this.templateHTML=tinymce.trim(h)},createTemplate:function(){var ed=tinyMCEPopup.editor,content=ed.getContent(),selection=ed.selection.getContent();""===selection&&(selection=content);var extras='<div class="uk-form-row">\t<label for="template_type" class="uk-form-label uk-width-3-10">'+tinyMCEPopup.getLang("dlg.type","Type")+'</label>   <div class="uk-form-controls uk-width-7-10">\t    <select id="template_type">\t\t    <option value="snippet">'+tinyMCEPopup.getLang("templatemanager_dlg.snippet","Snippet")+'</option>\t\t    <option value="template">'+tinyMCEPopup.getLang("templatemanager_dlg.template","Template")+"</option>\t    </select>   </div></div>";Wf.Modal.prompt(tinyMCEPopup.getLang("templatemanager_dlg.new_template","Create Template"),function(name){var type=$("#template_type").val();$.fn.filebrowser.status({message:tinyMCEPopup.getLang("dlg.message_load","Loading..."),state:"load"});var dir=$.fn.filebrowser.getcurrentdir();Wf.JSON.request("createTemplate",{json:[dir,name,type],data:selection},function(o){$("#src").trigger("filebrowser:load",name)})},{text:tinyMCEPopup.getLang("dlg.name","Name"),elements:extras,open:function(e){$(".uk-modal-footer .uk-text",e.target).text(Wf.translate("create","Create"))}})},selectFile:function(file){$("#insert").addClass("loading").prop("disabled",!0),Wf.JSON.request("loadTemplate",file.id,function(o){o&&!o.error&&TemplateManager.setHTML(o),$("#insert").removeClass("loading").prop("disabled",!1)})}};TemplateManager.preInit(),tinyMCEPopup.onInit.add(TemplateManager.init,TemplateManager);