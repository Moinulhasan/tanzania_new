tinymce.init({
    selector: 'textarea.myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    height: 340,
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss advlist autosave code directionality fullscreen help visualchars template save quickbars preview pagebreak nonbreaking insertdatetime importcss advhr advimage advlink bbcode contextmenu emotions fullpage iespell inlinepopups layer legacyoutput noneditable paste print spellchecker style tabfocus xhtmlxtras showcomments comments',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat searchreplace save preview nonbreaking insertdatetime | pagebreak anchor template codesample | paste print | code directionality fullscreen help visualchars',
    tinycomments_mode: 'floating',
    setup: function (ed) {
        ed.on('change', function (e) {
            $('.gmz-editor-content').val(ed.getContent()).change();
            console.log($(".gmz-editor-content").val());
        });
    }
});

tinymce.init({
    selector: 'textarea.myeditorinstance2', // Replace this CSS selector to match the placeholder element for TinyMCE
    height: 340,
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss advlist autosave code directionality fullscreen help visualchars template save quickbars preview pagebreak nonbreaking insertdatetime importcss advhr advimage advlink bbcode contextmenu emotions fullpage iespell inlinepopups layer legacyoutput noneditable paste print spellchecker style tabfocus xhtmlxtras showcomments comments',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat searchreplace save preview nonbreaking insertdatetime | pagebreak anchor template codesample | paste print | code directionality fullscreen help visualchars',
    tinycomments_mode: 'floating',
    setup: function (ed) {
        ed.on('change', function (e) {
            $('.tinymce-overview-content').val(ed.getContent()).change();
            console.log($(".tinymce-overview-content").val());
        });
    }
});

tinymce.init({
    selector: 'textarea.myeditorinstance3', // Replace this CSS selector to match the placeholder element for TinyMCE
    height: 340,
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss advlist autosave code directionality fullscreen help visualchars template save quickbars preview pagebreak nonbreaking insertdatetime importcss advhr advimage advlink bbcode contextmenu emotions fullpage iespell inlinepopups layer legacyoutput noneditable paste print spellchecker style tabfocus xhtmlxtras showcomments comments',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat searchreplace save preview nonbreaking insertdatetime | pagebreak anchor template codesample | paste print | code directionality fullscreen help visualchars',
    tinycomments_mode: 'floating',
    setup: function (ed) {
        ed.on('change', function (e) {
            $('.tinymce-overview-content2').val(ed.getContent()).change();
            console.log($(".tinymce-overview-content2").val());
        });
    }
});


tinymce.init({
    selector: 'textarea.myeditorinstance4', // Replace this CSS selector to match the placeholder element for TinyMCE
    height: 340,
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss advlist autosave code directionality fullscreen help visualchars template save quickbars preview pagebreak nonbreaking insertdatetime importcss advhr advimage advlink bbcode contextmenu emotions fullpage iespell inlinepopups layer legacyoutput noneditable paste print spellchecker style tabfocus xhtmlxtras showcomments comments',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat searchreplace save preview nonbreaking insertdatetime | pagebreak anchor template codesample | paste print | code directionality fullscreen help visualchars',
    tinycomments_mode: 'floating',
    setup: function (ed) {
        ed.on('change', function (e) {
            $('.tinymce-overview-content3').val(ed.getContent()).change();
            console.log($(".tinymce-overview-content3").val());
        });
    }
});

