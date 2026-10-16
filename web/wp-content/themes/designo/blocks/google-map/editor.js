/* Native block editor controls; no build step or external requests. */
(function (blocks, editor, components, element, i18n) {
 'use strict';
 const el = element.createElement;
 const __ = i18n.__;
 const metadata = window.designoMapBlockMetadata;
 blocks.registerBlockType(metadata.name, Object.assign({}, metadata, {
  edit: function (props) {
   const a = props.attributes;
   const field = function (key, label, help, multiline) {
    const control = multiline ? components.TextareaControl : components.TextControl;
    return el(control, {key: key, label: label, value: a[key], help: help,
     onChange: function (value) { props.setAttributes({[key]: value}); }
    });
   };
   let invalid = false;
   if (a.embedUrl) {
    try {
     const url = new URL(a.embedUrl);
     invalid = url.protocol !== 'https:' || !['www.google.com', 'google.com'].includes(url.hostname) || url.pathname !== '/maps/embed' || !url.searchParams.get('pb') || !!url.username || !!url.password || !!url.port;
    } catch (error) { invalid = true; }
   }
   return el(element.Fragment, null,
    el(editor.InspectorControls, null,
     el(components.PanelBody, {title: __('Map settings', 'designo')},
      field('placeLabel', __('Office / map title', 'designo')),
      field('address', __('Address to search (required)', 'designo'), __('Keep this in sync with the office address beside the map. Verify the result in Google Maps before publishing.', 'designo'), true),
      field('embedUrl', __('Exact Google Maps embed URL (optional)', 'designo'), __('For an exact location: Google Maps → Share → Embed a map. Paste only the iframe src URL, beginning https://www.google.com/maps/embed?pb=. Clear it to search by address instead.', 'designo')),
      invalid && el(components.Notice, {status: 'warning', isDismissible: false}, __('This is not a supported Google Share embed URL. The published map will search by address instead.', 'designo'))
     ),
     el(components.PanelBody, {title: __('Map text', 'designo'), initialOpen: false},
      field('directionsLabel', __('Google Maps link label', 'designo'))
     )
    ),
    el('div', editor.useBlockProps({className: 'designo-map'}),
     el('div', {className: 'designo-map__viewport'},
      el('div', {className: 'designo-map__editor-preview'},
       el('p', {className: 'designo-map__title'}, el('strong', null, a.placeLabel)),
       el('p', null, a.address || __('Select this block and enter an office address in Map settings.', 'designo')),
       el('p', null, __('The live map loads automatically. Google receives visitor network/browser information; review your privacy notice.', 'designo'))
      )
     ),
     el('p', {className: 'designo-map__actions'}, __('Editor preview only — the published page displays Google Maps automatically.', 'designo'))
    )
   );
  },
  save: function () { return null; }
 }));
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n);
