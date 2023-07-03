<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">{{__('Application: ')}} {{$testTemplate->app->title}}</h1>
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">{{__('Scenario: ')}} {{$testTemplate->title}}</h1>

        @if($showCreateForm)
            {{$this->dispatchBrowserEvent('contentChanged', ['payload' => 'load-ckeditor'])}}
            <form action="{{route('test-case.store')}}" method="post" class="mx-6">
                @csrf
                <input type="hidden" name="test_template" value="{{$testTemplate->id}}">
                <div class="my-2">
                    <label for="title" class="text-gray-100">{{__('title')}}</label>
                    <input
                        class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4 outline-violet-600"
                        name="title"
                        placeholder="{{__('title')}}" required/>
                </div>
                <div class="my-2">
                    <label for="description" class="text-gray-100">{{__('description')}}</label>
                    <textarea name="description" id="" cols="30" rows="10"
                              class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4  focus:outline-violet-600"></textarea>
                </div>
                <div class="my-2">
                    <label for="test_steps" class="text-gray-100">{{__('test steps')}}</label>
                    <div id="container">
                        <textarea id="editor" name="test_steps"></textarea>
                    </div>
                </div>
                <div class="my-2">
                    <label for="test_data" class="text-gray-100">{{__('test data')}}</label>
                    <textarea name="test_data"  cols="30" rows="5"
                              class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4  focus:outline-violet-600"></textarea>
                </div>
                <div class="my-2">
                    <label for="exception_result" class="text-gray-100">{{__('exception result')}}</label>
                    <textarea name="exception_result"  cols="30" rows="5"
                              class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4  focus:outline-violet-600"></textarea>
                </div>
                <div class="flex w-full gap-4">
                    <input type="submit" value="{{__('save')}}"
                           class="rounded-lg bg-indigo-600 mb-4 px-4 py-2 text-white">
                    <button class="rounded-lg bg-rose-600 mb-4 px-4 py-2 text-white" wire:click="deActiveForm"
                            onclick="event.preventDefault()">{{__('cancel')}}</button>
                </div>
            </form>
        @else
            <button class="rounded-lg bg-indigo-600 mb-4 px-4 py-2 text-white "
                    wire:click="activateForm">{{__('create new test case')}}</button>
        @endif
        <table class="table table-fixed table-auto w-full border-collapse border border-2 border-slate-500">
            <thead class="table-header-group w-48">
            <tr class="w-48">
                <th class="border-collapse border border-slate-500 ">{{__('id')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('title')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('description')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('creator')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('created at')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($testCases as $testCase)
                <tr class="table-row" wire:key="{{$testCase->id}}">
                    <td class="table-cell text-center border border-slate-700">{{$testCase->id}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$testCase->title}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$testCase->description}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$testCase->user->name}}
                        / {{$testCase->user->email}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$testCase->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/super-build/ckeditor.js"></script>
<!--
    Uncomment to load the Spanish translation
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/super-build/translations/es.js"></script>
-->
<script>
    window.addEventListener('contentChanged', (event) => {
        if (event.detail.payload === 'load-ckeditor') {
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF', 'exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                        {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                        {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                        {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                        {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                        {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                        {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Welcome to CKEditor 5!',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
        }
    });
</script>


