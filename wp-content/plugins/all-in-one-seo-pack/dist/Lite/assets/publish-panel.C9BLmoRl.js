import"./js/vue2.RHmKp0B5.js";import{x as f,o as n,c as a,a as r,F as w,K as A,l as C,H as v,v as T,D as S,t as u,C as _,d as h,X as q}from"./js/vue.esm-bundler.CWQFYt9y.js";import{l as J}from"./js/index.D7hEMYOO.js";import{l as Y}from"./js/index.BB7B6rSp.js";import{l as X}from"./js/index.3BJ3ZnWB.js";import{a as Q,b as ee,e as te,d as R,z as se,l as O,u as oe}from"./js/links.cMjoa9mX.js";import{a as re}from"./js/allowed.CIWIyN0m.js";import{t as ie}from"./js/postSlug.XW1wPUFy.js";import{a as ne}from"./js/Image.J_eZiLlI.js";import{T as ae}from"./js/Tags.DsiuS2Z3.js";import{C as ce}from"./js/GoogleSearchPreview.DfWUGO2R.js";import{c as le,e as de,f as ue}from"./js/Caret.iRBf3wcH.js";import{S as pe}from"./js/Exclamation.DKtT8kuH.js";import{S as he}from"./js/External.Bfg4674G.js";import{_ as m}from"./js/_plugin-vue_export-helper.BN1snXvA.js";import{S as me}from"./js/Twitter.B7sqVqjX.js";import{s as _e}from"./js/metabox.B54N9lJ3.js";import{l as ge}from"./js/loadTruSeo.Azf6JCRZ.js";import{e as fe}from"./js/elemLoaded.COgXIo-H.js";import{t as I}from"./js/toString.XwB3Xa5p.js";import{u as ve}from"./js/upperFirst.CP4N4hLd.js";import{d as Se}from"./js/cleanForSlug.o2RefBn0.js";import"./js/translations.Buvln_cw.js";import"./js/default-i18n.Bd0Z306Z.js";import"./js/constants.B6ynd7gz.js";import"./js/helpers.D2xRWOvn.js";import"./js/get.BT85ybc8.js";import"./js/_baseSet.DALGekmy.js";import"./js/_stringToArray.DnK4tKcY.js";import"./js/_baseTrim.BYZhh0MR.js";function be(e){return ve(I(e).toLowerCase())}function ye(e,t,s,o){for(var i=-1,l=e==null?0:e.length;++i<l;)s=t(s,e[i],i,e);return s}var Pe=/[^\x00-\x2f\x3a-\x40\x5b-\x60\x7b-\x7f]+/g;function xe(e){return e.match(Pe)||[]}var Ee=/[a-z][A-Z]|[A-Z]{2}[a-z]|[0-9][a-zA-Z]|[a-zA-Z][0-9]|[^a-zA-Z0-9 ]/;function $e(e){return Ee.test(e)}var M="\\ud800-\\udfff",ke="\\u0300-\\u036f",we="\\ufe20-\\ufe2f",Ae="\\u20d0-\\u20ff",Ce=ke+we+Ae,L="\\u2700-\\u27bf",z="a-z\\xdf-\\xf6\\xf8-\\xff",Te="\\xac\\xb1\\xd7\\xf7",Re="\\x00-\\x2f\\x3a-\\x40\\x5b-\\x60\\x7b-\\xbf",Oe="\\u2000-\\u206f",Ie=" \\t\\x0b\\f\\xa0\\ufeff\\n\\r\\u2028\\u2029\\u1680\\u180e\\u2000\\u2001\\u2002\\u2003\\u2004\\u2005\\u2006\\u2007\\u2008\\u2009\\u200a\\u202f\\u205f\\u3000",U="A-Z\\xc0-\\xd6\\xd8-\\xde",Me="\\ufe0e\\ufe0f",V=Te+Re+Oe+Ie,D="['’]",b="["+V+"]",Le="["+Ce+"]",B="\\d+",ze="["+L+"]",N="["+z+"]",F="[^"+M+V+B+L+z+U+"]",Ue="\\ud83c[\\udffb-\\udfff]",Ve="(?:"+Le+"|"+Ue+")",De="[^"+M+"]",K="(?:\\ud83c[\\udde6-\\uddff]){2}",W="[\\ud800-\\udbff][\\udc00-\\udfff]",p="["+U+"]",Be="\\u200d",y="(?:"+N+"|"+F+")",Ne="(?:"+p+"|"+F+")",P="(?:"+D+"(?:d|ll|m|re|s|t|ve))?",x="(?:"+D+"(?:D|LL|M|RE|S|T|VE))?",Z=Ve+"?",j="["+Me+"]?",Fe="(?:"+Be+"(?:"+[De,K,W].join("|")+")"+j+Z+")*",Ke="\\d*(?:1st|2nd|3rd|(?![123])\\dth)(?=\\b|[A-Z_])",We="\\d*(?:1ST|2ND|3RD|(?![123])\\dTH)(?=\\b|[a-z_])",Ze=j+Z+Fe,je="(?:"+[ze,K,W].join("|")+")"+Ze,Ge=RegExp([p+"?"+N+"+"+P+"(?="+[b,p,"$"].join("|")+")",Ne+"+"+x+"(?="+[b,p+y,"$"].join("|")+")",p+"?"+y+"+"+P,p+"+"+x,We,Ke,B,je].join("|"),"g");function He(e){return e.match(Ge)||[]}function qe(e,t,s){return e=I(e),t=t,t===void 0?$e(e)?He(e):xe(e):e.match(t)||[]}var Je="['’]",Ye=RegExp(Je,"g");function Xe(e){return function(t){return ye(qe(Se(t).replace(Ye,"")),e,"")}}var E=Xe(function(e,t,s){return t=t.toLowerCase(),e+(s?be(t):t)});const Qe={setup(){return{optionsStore:Q(),postEditorStore:ee(),settingsStore:te(),tagsStore:R()}},mixins:[ae,ne],components:{CoreGoogleSearchPreview:ce,SvgCircleCheck:le,SvgCircleClose:de,SvgCircleExclamation:pe,SvgExternal:he,SvgPencil:ue},data(){return{allowed:re,separator:void 0,socialImage:null,socialImageKey:0,strings:{serpPreview:this.$t.__("SERP Preview",this.$td),canonicalUrl:this.$t.__("Canonical URL",this.$td)}}},computed:{tips(){let e=[{label:this.$t.__("Visibility",this.$td),name:"visibility",access:"aioseo_page_advanced_settings"},{label:this.$t.__("SEO Analysis",this.$td),name:"seoAnalysis",access:"aioseo_page_analysis"},{label:this.$t.__("Readability",this.$td),name:"readabilityAnalysis",access:"aioseo_page_analysis"},{label:this.$t.__("Focus Keyphrase",this.$td),name:"focusKeyphrase",access:"aioseo_page_analysis"},{label:this.$t.__("Social",this.$td),name:"social",access:"aioseo_page_social_settings"}].filter(t=>this.allowed(t.access)&&(t.access!=="aioseo_page_analysis"||ie()));return!this.optionsStore.options.social.facebook.general.enable&&!this.optionsStore.options.social.twitter.general.enable&&(e=e.filter(t=>t.name!=="social")),e.forEach((t,s)=>{e[s]={...t,...this.getData(t.name)}}),e},canImprove(){return this.tips.some(e=>e.type==="error")}},methods:{getIcon(e){switch(e){case"error":return"svg-circle-close";case"warning":return"svg-circle-exclamation";case"success":default:return"svg-circle-check"}},getData(e){const t={};if(e==="visibility"&&(t.value=this.$t.__("Good!",this.$td),t.type="success",(this.postEditorStore.currentPost.default?this.optionsStore.dynamicOptions.searchAppearance.postTypes[this.postEditorStore.currentPost.postType]&&!this.optionsStore.dynamicOptions.searchAppearance.postTypes[this.postEditorStore.currentPost.postType].advanced.robotsMeta.default&&this.optionsStore.dynamicOptions.searchAppearance.postTypes[this.postEditorStore.currentPost.postType].advanced.robotsMeta.noindex:this.postEditorStore.currentPost.noindex)&&(t.value=this.$t.__("Blocked!",this.$td),t.type="error")),e==="seoAnalysis"){t.value=this.$t.__("N/A",this.$td),t.type="error";const s=this.postEditorStore.currentPost.seo_score;Number.isInteger(s)&&(t.value=s+"/100",t.type=80<s?"success":50<s?"warning":"error")}if(e==="readabilityAnalysis"){t.value=this.$t.__("Good!",this.$td),t.type="success";const s=this.postEditorStore.currentPost.page_analysis.analysis.readability.errors;s&&0<s&&(t.value=this.$t.sprintf(this.$t._n("%1$s error found!","%1$s errors found!",s,this.$td),s),t.type="error")}if(e==="focusKeyphrase"){t.value=this.$t.__("No focus keyphrase!",this.$td),t.type="error";const s=this.postEditorStore.currentPost.keyphrases.focus;s&&s.keyphrase&&(t.value=s.score+"/100",t.type=80<s.score?"success":50<s.score?"warning":"error")}if(e==="social"){t.value=this.$t.__("Good!",this.$td),t.type="success",this.socialImageKey;const s=this.parseTags(this.postEditorStore.currentPost.og_title||this.postEditorStore.currentPost.title||this.postEditorStore.currentPost.tags.title).trim(),o=this.parseTags(this.postEditorStore.currentPost.og_description||this.postEditorStore.currentPost.description||this.postEditorStore.currentPost.tags.description).trim(),i=this.socialImage;(!s||!o||!i)&&(t.value=this.$t.__("Missing social markup!",this.$td),t.type="error")}return{...t,icon:this.getIcon(t.type)}},openSidebar(e){const{closePublishSidebar:t,openGeneralSidebar:s}=window.wp.data.dispatch("core/edit-post");t(),s("aioseo-post-settings-sidebar/aioseo-post-settings-sidebar");const o={};switch(e){case"canonical":case"visibility":o.tab="advanced";break;case"seoAnalysis":o.tab="general",o.card="basicseo";break;case"readabilityAnalysis":o.tab="general",o.card="readability";break;case"focusKeyphrase":o.tab="general",o.card="focus";break;case"social":o.tab="social";break}this.settingsStore.changeTabSettings({setting:"mainSidebar",value:o})}},async mounted(){await this.setImageUrl().then(()=>{this.socialImage=this.imageUrl}),window.aioseoBus.$on("updateSocialImagePreview",e=>{this.socialImage=e.image,this.socialImageKey++}),this.$nextTick(()=>{const e=document.querySelector(".aioseo-pre-publish .editor-post-publish-panel__link");e&&(e.innerHTML=this.canImprove?this.$t.__("Your post needs improvement!",this.$td):this.$t.__("You're good to go!",this.$td))})}},et={key:0,class:"seo-overview"},tt={class:"pre-publish-checklist"},st={class:"icon"},ot=["onClick"],rt={key:0,class:"snippet-preview"},it={class:"title"},nt={key:1,class:"canonical-url"},at={class:"title"},ct=["href"];function lt(e,t,s,o,i,l){const c=f("svg-pencil"),g=f("core-google-search-preview"),G=f("svg-external");return o.postEditorStore.currentPost.id?(n(),a("div",et,[r("ul",tt,[(n(!0),a(w,null,A(l.tips,(d,H)=>(n(),a("li",{key:H},[r("span",st,[(n(),C(T(d.icon),{class:v(d.type)},null,8,["class"]))]),r("span",null,[S(u(d.label)+": ",1),r("span",{class:v(["result",d.value.endsWith("/100")?d.type:null])},u(d.value),3)]),o.optionsStore.dynamicOptions.searchAppearance.postTypes[o.postEditorStore.currentPost.postType]&&o.optionsStore.dynamicOptions.searchAppearance.postTypes[o.postEditorStore.currentPost.postType].advanced.showMetaBox?(n(),a("span",{key:0,class:"edit",onClick:Dt=>l.openSidebar(d.name)},[_(c)],8,ot)):h("",!0)]))),128))]),i.allowed("aioseo_page_analysis")?(n(),a("div",rt,[r("p",it,u(i.strings.serpPreview)+":",1),_(g,{url:o.tagsStore.liveTags.permalink,title:e.parseTags(o.postEditorStore.currentPost.title||o.postEditorStore.currentPost.tags.title||"#post_title #separator_sa #site_title"),description:e.parseTags(o.postEditorStore.currentPost.description||o.postEditorStore.currentPost.tags.description||"#post_content")},null,8,["url","title","description"])])):h("",!0),i.allowed("aioseo_page_analysis")&&o.postEditorStore.currentPost.canonicalUrl?(n(),a("div",nt,[r("p",at,[S(u(i.strings.canonicalUrl)+": ",1),r("span",{class:"edit",onClick:t[0]||(t[0]=d=>l.openSidebar("canonical"))},[_(c)])]),r("a",{href:o.postEditorStore.currentPost.canonicalUrl,target:"_blank",rel:"noopener noreferrer"},[r("span",null,u(o.postEditorStore.currentPost.canonicalUrl),1),_(G)],8,ct)])):h("",!0)])):h("",!0)}const $=m(Qe,[["render",lt]]),dt={},ut={width:"32",height:"32",fill:"none",class:"aioseo-facebook-rounded",xmlns:"http://www.w3.org/2000/svg"},pt=r("circle",{cx:"16",cy:"16",r:"16",fill:"currentColor"},null,-1),ht=r("path",{d:"M24 16c0-4.4-3.6-8-8-8s-8 3.6-8 8c0 4 2.9 7.3 6.7 7.9v-5.6h-2V16h2v-1.8c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V16h2.2l-.4 2.3h-1.9V24c4-.6 6.9-4 6.9-8z",fill:"#fff"},null,-1),mt=[pt,ht];function _t(e,t){return n(),a("svg",ut,mt)}const gt=m(dt,[["render",_t]]),ft={},vt={width:"32",height:"32",fill:"none",class:"aioseo-linkedin-rounded",xmlns:"http://www.w3.org/2000/svg"},St=r("circle",{cx:"16",cy:"16",r:"16",fill:"currentColor"},null,-1),bt=r("path",{d:"M11.6 24H8.2V13.3h3.4V24zM9.9 11.8C8.8 11.8 8 11 8 9.9 8 8.8 8.9 8 9.9 8c1.1 0 1.9.8 1.9 1.9 0 1.1-.8 1.9-1.9 1.9zM24 24h-3.4v-5.8c0-1.7-.7-2.2-1.7-2.2s-2 .8-2 2.3V24h-3.4V13.3h3.2v1.5c.3-.7 1.5-1.8 3.2-1.8 1.9 0 3.9 1.1 3.9 4.4V24h.2z",fill:"#fff"},null,-1),yt=[St,bt];function Pt(e,t){return n(),a("svg",vt,yt)}const xt=m(ft,[["render",Pt]]),Et={},$t={width:"32",height:"32",fill:"none",class:"aioseo-pinterest-rounded",xmlns:"http://www.w3.org/2000/svg"},kt=r("circle",{cx:"16",cy:"16",r:"16",fill:"currentColor"},null,-1),wt=r("path",{d:"M16.056 6.583c-5.312 0-9.658 4.346-9.658 9.658a9.581 9.581 0 005.795 8.813c0-.724 0-1.448.12-2.173.242-.845 1.207-5.312 1.207-5.312s-.362-.604-.362-1.57c0-1.448.846-2.535 1.811-2.535.845 0 1.328.604 1.328 1.45 0 .844-.603 2.172-.845 3.38-.241.965.483 1.81 1.57 1.81 1.81 0 3.018-2.293 3.018-5.19 0-2.174-1.449-3.743-3.984-3.743-2.898 0-4.709 2.173-4.709 4.587 0 .845.242 1.449.604 1.932.12.241.242.241.12.483 0 .12-.12.603-.24.724-.121.242-.242.362-.483.242-1.329-.604-1.932-2.053-1.932-3.743 0-2.777 2.294-6.036 6.881-6.036 3.743 0 6.157 2.656 6.157 5.553 0 3.743-2.052 6.64-5.19 6.64-1.087 0-2.053-.603-2.415-1.207 0 0-.604 2.173-.725 2.656a10.702 10.702 0 01-.966 2.052c.846.242 1.811.363 2.777.363 5.312 0 9.658-4.347 9.658-9.659.121-4.829-4.225-9.175-9.537-9.175z",fill:"#fff"},null,-1),At=[kt,wt];function Ct(e,t){return n(),a("svg",$t,At)}const Tt=m(Et,[["render",Ct]]),Rt={setup(){return{tagsStore:R()}},components:{SvgFacebookRounded:gt,SvgLinkedinRounded:xt,SvgPinterestRounded:Tt,SvgIconTwitter:me},data(){return{strings:{title:this.$t.__("Get out the word!",this.$td),description:this.$t.__("Share your content on your favorite social media platforms to drive engagement and increase your SEO.",this.$td)}}},computed:{socialNetworks(){return[{icon:"svg-icon-twitter",link:"https://x.com/share?url="},{icon:"svg-facebook-rounded",link:"https://www.facebook.com/sharer/sharer.php?u="},{icon:"svg-pinterest-rounded",link:"https://pinterest.com/pin/create/button/?url="},{icon:"svg-linkedin-rounded",link:"https://www.linkedin.com/shareArticle?url="}].map(e=>({...e,link:e.link+this.tagsStore.liveTags.permalink}))}}},Ot={key:0,class:"aioseo-post-publish"},It={class:"title"},Mt={class:"description"},Lt={class:"links"},zt=["href"];function Ut(e,t,s,o,i,l){return o.tagsStore.liveTags.permalink?(n(),a("div",Ot,[r("h2",It,u(i.strings.title),1),r("p",Mt,u(i.strings.description),1),r("div",Lt,[(n(!0),a(w,null,A(l.socialNetworks,(c,g)=>(n(),a("a",{class:"link",target:"_blank",key:g,href:c.link},[(n(),C(T(c.icon)))],8,zt))),128))])])):h("",!0)}const Vt=m(Rt,[["render",Ut]]);(function(e){if(!se()||!_e()||!e.editPost.PluginDocumentSettingPanel)return;const t=e.editPost.PluginDocumentSettingPanel,s=e.editPost.PluginPrePublishPanel,o=e.editPost.PluginPostPublishPanel,i=e.plugins.registerPlugin;O();const c=oe().aioseo.user;!c.capabilities.aioseo_page_analysis&&!c.capabilities.aioseo_page_general_settings&&!c.capabilities.aioseo_page_advanced_settings||i("aioseo-publish-panel",{render:()=>e.element.createElement(e.element.Fragment,{},e.element.createElement(t,{title:"AIOSEO",className:"aioseo-document-setting aioseo-seo-overview",icon:e.element.Fragment},e.element.createElement("div",{},e.element.createElement("div",{id:"aioseo-document-setting"}))),e.element.createElement(s,{title:["AIOSEO",":",e.element.createElement("span",{key:"scoreDescription",className:"editor-post-publish-panel__link"})],className:"aioseo-pre-publish aioseo-seo-overview",initialOpen:!0,icon:e.element.Fragment},e.element.createElement("div",{},e.element.createElement("div",{id:"aioseo-pre-publish"}))),e.element.createElement(o,{title:"AIOSEO",initialOpen:!0,icon:e.element.Fragment},e.element.createElement("div",{},e.element.createElement("div",{id:"aioseo-post-publish"}))))})})(window.wp);const k=e=>{let t=q({...e.component,name:"Standalone/PublishPanel"});return t=J(t),t=Y(t),t=X(t),O(t),t.mount("#"+e.id),window.addEventListener("load",()=>{ge(t,!1)}),t};window.aioseo.currentPost&&window.aioseo.currentPost.context==="post"&&[{id:"aioseo-pre-publish",component:$},{id:"aioseo-document-setting",component:$},{id:"aioseo-post-publish",component:Vt}].forEach(t=>{document.getElementById(t.id)?k(t):(fe("#"+t.id,E(t.id)),document.addEventListener("animationstart",function(s){E(t.id)===s.animationName&&k(t)},{passive:!0}))});
