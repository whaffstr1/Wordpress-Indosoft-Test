!function(){"use strict";var e={d:function(t,o){for(var r in o)e.o(o,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:o[r]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}};e.d({},{l:function(){return l}});var t=window.wp.blocks,o=JSON.parse('{"$schema":"https://json.schemastore.org/block.json","apiVersion":2,"name":"gutenberg-examples/example-01-basic-esnext","title":"Example: Basic (ESNext)","textdomain":"gutenberg-examples","icon":"universal-access-alt","category":"layout","example":{},"editorScript":"file:./build/index.js"}'),r=window.wp.element,n=window.wp.i18n,s=window.wp.blockEditor;const l={backgroundColor:"#900",color:"#fff",padding:"20px"},{name:a}=o;(0,t.registerBlockType)(a,{edit:()=>{const e=(0,s.useBlockProps)({style:l});return(0,r.createElement)("div",e,(0,n.__)("Hello World, step 1 (from the editor).","gutenberg-examples"))},save:()=>{const e=s.useBlockProps.save({style:l});return(0,r.createElement)("div",e,(0,n.__)("Hello World, step 1 (from the frontend).","gutenberg-examples"))}})}();