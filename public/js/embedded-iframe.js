// /js/embedded-iframe.js

(function(){
    /*var this_js_script = $('script[src*=embedded-iframe]'); // or better regexp to get the file name..

    var dataOrganization = this_js_script.attr('data-organization');
    if (typeof dataOrganization === "undefined" ) {
        dataOrganization = 'some_default_value';
    }
    alert(dataOrganization);*/

    // Note the id, we need to set this correctly on the script tag responsible for
    // requesting this file.
    var me = document.getElementById('tagg-embedded-donation-request');

    function loadIFrame() {
        var ifrm = document.createElement('iframe');
        ifrm.id = 'my-iframe-identifier';
        ifrm.setAttribute('src', 'http://localhost:8080/tagg/public/donationrequests/create?orgId=1&newrequest=2');
        ifrm.style.width = '1px';
        ifrm.style.minWidth = '100%';
        ifrm.style.border = 0;
        // we initially hide the iframe to avoid seeing the iframe resizing
        //ifrm.style.opacity = 0;
        ifrm.scrolling = 'no';

        me.insertAdjacentElement('afterend', ifrm);
        $('#my-iframe-identifier').iFrameResize({
            log: true, inPageLinks: true,
            heightCalculationMethod: 'taggedElement'
            //maxHeight: 2500
        }, '#my-iframe-identifier');
    }
    if (!window.iFrameResize) {
        // We first need to ensure we inject the js required to resize our iframe.


        var resizerScriptTag = document.createElement('script');
        resizerScriptTag.type = 'text/javascript';

        // IMPORTANT: insert the script tag before attaching the onload and setting the src.
        me.insertAdjacentElement('afterend', resizerScriptTag);

        // IMPORTANT: attach the onload before setting the src.
        resizerScriptTag.onload = loadIFrame;

        // This a CDN resource to get the iFrameResizer code.
        // NOTE: You must have the below "coupled" script hosted by the content that
        // is loaded within the iframe:
        // https://unpkg.com/iframe-resizer@3.5.14/js/iframeResizer.contentWindow.min.js
        resizerScriptTag.src = 'https://unpkg.com/iframe-resizer@3.5.15/js/iframeResizer.min.js';
    } else {
        // Cool, the iFrameResizer exists so we can just load our iframe.
        loadIFrame();
    }
    if(!window.jQuery) {
        var jQueryTagg = document.createElement('script');
        jQueryTagg.type = 'text/javascript';
        me.insertAdjacentElement('afterend', jQueryTagg);
        jQueryTagg.src = 'https://code.jquery.com/jquery-1.11.2.min.js';
    }

}());