<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel + VueJS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrar-se</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 2048 585" width="300" height="90">
                        <path transform="translate(1578,119)" d="m0 0h14l11 1h11l18-1 5 2 6 5 8 4 4 5 6 15 20 56 23 67 13 40 15 43 4 12 2-30 3-12 13-19 9-13 12-17 10-16 2-4-1-7-11-18-11-16-14-20-10-15-2-5v-48l5-5h44l6 4 12 7 7 8 14 22 9 14 3 2 2-5 24-40 7-9 2-2 7-1h37l4 2 5 5 6 2 3 4 1 5v32l-3 12-6 11-8 12-13 18-14 21-3 6v8l6 11 10 15 13 19 11 16 6 10 2 8v33l-3 8-6 4-12 2h-23l-21-2-6-7-10-15-15-25-3-4v-2l-3 3-11 18-12 19-7 9-8 4-10 1-1 1h-27l-14-2-8-7-5 5-6 3-9 1h-44l-16-2-5-3-4-8-5-21-1-3h-51l-4 5-7 21-4 6-5 3-14 2h-37l-14-1-8-3-3-3 2-13 8-27 13-41 23-71 16-49 17-54zm37 130-6 23v5h14l-4-20-3-8z" fill="#FCFCFC"/>
                        <path transform="translate(1269,122)" d="m0 0h32l4 5 9 4 5 5 8 18 28 70 8 16 6-13 16-39 24-58 4-6 1-1 42-1h19l3 5 9 4 3 3 1 4v39l-2 87 2 74v39l-6 7-10 2h-58l-7-1-3-4-1-8v-38l-1-9-11 27-8 22-5 9-8 4-8 1h-16l-6-5-11-27-12-31-1-2v14l-1 32-2 10-4 4-11 2h-55l-7-1-4-6v-18l3-73 1-22v-40l-1-17-1-38v-45l4-2z" fill="#FCFCFC"/>
                        <path transform="translate(190,123)" d="m0 0h61l27 2 19 4 16 6 16 8 13 9 10 8v2l3 1 10 13 11 21 6 18 4 17 1 10v30l-3 21-6 20-8 16-10 16-6 8h-2l-2 4-11 10-11 7-12 5-16 4-25 4h-96l-12-2-3-2-2-8v-43l2-50v-54l-1-27-1-68 2-7 9-2zm64 66-6 3-3 4-1 4-1 29v64l1 20 2 5 3 1h10l11-2 14-7 10-10 6-11 4-11 2-7 1-12v-14l-2-13-4-13-8-13-6-7-10-7-9-3z" fill="#FCFCFC"/>
                        <path transform="translate(787,122)" d="m0 0h32l18 2 16 5 16 8 10 6 11 8 8 8 9 15 4 13 2 12v25l-2 14-4 13-7 12-9 11-8 9-1 9 6 16 15 35 11 27 1 8-4 5-12 4h-48l-15-1-4-2-6-14-14-40-10-25-2-3-5 1-2 5v26l2 39-3 8-3 3-12 3h-53l-10-1-5-5-1-3v-34l3-76v-63l-2-55-1-19 5-5 3-1 36-2zm15 64-7 3-3 3-2 9v32l2 9 3 1h11l10-2 6-3 5-5 3-6 1-5v-12l-2-9-6-9-6-4-8-2z" fill="#036697"/>
                        <path transform="translate(533,123)" d="m0 0 53 1h22l31-1h25l10 2 4 4v2h6l5 4 2 5 3 27v23l-6 5-29-2-11-1-30-1-10 1-4 7v16l3 1h22l36-2h8l3 1 2 5 9 3 2 3 1 10-3 37-2 10-6 5-15 1-10-1-39-1-10 1-1 3v18l1 4 2 1h41l20-2h15l6 6 7 3 3 3 1 4v9l-3 26-4 16-6 7-4 2h-7l-2 1h-9l-8-1-111-1-19-1-7-3-2-4-1-6 1-33 3-74v-38l-1-27-1-45-1-17v-11l4-4z" fill="#026596"/>
                        <path transform="translate(1578,119)" d="m0 0h14l11 1h11l18-1 5 2 2 3 3 11 11 31 47 141 14 43 7 23v9l-4 3-11 1h-44l-9-3-4-6-6-24-1-3h-51l-4 5-7 21-4 6-5 3-14 2h-37l-14-1-8-3-3-3 2-13 8-27 13-41 23-71 16-49 17-54zm37 130-6 23v5h14l-4-20-3-8z" fill="#FCFCFC"/>
                        <path transform="translate(1129,117)" d="m0 0 21 1 17 4 15 6 16 9 14 10 10 9 5 8 1 8-5 14-10 19-6 9-6 5-7-1-3-2-5 4-5-2-6-5-5-5-10-8-12-5-10 1-9 3-9 7-6 7-7 13-4 18-1 17 3 19 4 12 6 10 5 6 8 4 4 1 14-1 12-4 10-7 14-12 4-1 8 7 8 3 5 4 8 13 11 19 2 6-1 9-6 9-6 7-14 11-12 7-14 5-17 3-8 1h-32l-18-4-17-7-12-8-10-9-9-9-10-14-7-12-6-15-5-17-3-16-1-11v-33l2-14 4-18 6-17 10-19 8-11 12-14 12-10 14-8 13-5 14-3z" fill="#026597"/>
                        <path transform="translate(459,124)" d="m0 0h14l11 1 3 5 9 3 3 7v157l-1 23-3 24-5 21-8 20-8 15-10 14-9 9-7 3-4-1v-2l-10 7-5-2-22-28-17-17-2-9 2-6 7-8 7-7 6-10 4-13 2-11 1-15v-93l-2-36-2-31-1-7v-9l3-3z" fill="#FCFCFC"/>
                        <path transform="translate(927,124)" d="m0 0h66l5 6 8 2 3 4v43l-2 56v51l1 44v46l-4 7-9 3-5 1h-54l-10-2-5-5v-30l2-39 1-46v-52l-1-45v-39l1-4z" fill="#056798"/>
                        <path transform="translate(1733,413)" d="m0 0h16l8 3 10 8 9 13 1 5-1 8 3 6 4 7-1 10-8 11-7 4-9 3h-14l-10-4-14-11-7-7-5-10-1-4v-16l4-10 7-8 9-6zm4 45-1 4 1 1h8l6-3-1-2z" fill="#F9F9F9"/>
                        <path transform="translate(485,130)" d="m0 0 9 2 4 4 1 4v157l-1 23-3 24-5 21-8 20-8 15-10 14-9 9-7 3-4-1v-2l-2-1 10-12 9-15 8-17 7-21 4-20 2-20 1-21 1-156z" fill="#242E33"/>
                        <path transform="translate(869,413)" d="m0 0h14l9 3 9 7 7 9 7 8 4 10 1 3v12l-4 11-8 9-10 5-4 1h-13l-9-3-8-6-11-9-6-8-4-10-1-4v-8l4-13 9-10 7-5zm18 29-8 3-5 5-2 3v7l1 3 2 1h7l8-6 2-4v-10l-1-2z" fill="#F9FAFA"/>
                        <path transform="translate(1899,124)" d="m0 0h21l5 6 6 1 4 5 1 5v32l-3 12-6 11-8 12-13 18-14 21-3 6v8l6 11 10 15 13 19 11 16 6 10 2 8v33l-3 8-6 4-12 2h-23v-1l18-1 6-1 2-3 1-5v-37l-2-8-44-66-4-7v-6l14-21 14-20 15-23 5-9 1-13v-38l-5-2-15-1z" fill="#232E34"/>
                        <path transform="translate(1477,128)" d="m0 0 9 2 4 4 1 4v39l-2 87 2 74v39l-6 7-10 2h-28v-1l26-1 2-5v-24l-2-51-1-37v-24l4-114z" fill="#232F35"/>
                        <path transform="translate(1638,124)" d="m0 0 5 2 8 4 4 5 6 15 20 56 23 67 13 40 15 43 5 17-1 7-10 6-9 1h-44v-1l33-1 11-1 3-2v-9l-12-39-53-159-15-43z" fill="#242E33"/>
                        <path transform="translate(274,126)" d="m0 0h10l19 5 17 7 17 10 11 9 4 3v2l3 1 10 13 11 21 6 18 4 17 1 10v30l-3 21-6 20-8 16-10 16-6 8h-2l-2 4-11 10-11 7-12 5-16 4-25 4h-96v-1l90-1 13-1 15-4 13-5 14-9 10-9 8-9 12-19 8-18 5-16 3-16 1-9v-28l-2-16-5-21-6-15-8-16-9-12-9-10-13-10-17-8-17-5-11-2z" fill="#242F34"/>
                        <path transform="translate(1227,414)" d="m0 0 10 1 2 7 3 7 5 4 3 9 1 19 2-3 1-40 1-3 6-1 8 1 3 13 6 5 2 6v36l-3 8-7 6-12 3-9-1-6-3-7-6-6-4-6-8-2-6v-36l1-13z" fill="#FBFBFB"/>
                        <path transform="translate(1545,414)" d="m0 0 7 3 9 8 11 8 5-2 14-13 6-4h3l1 6v12l6 1 3 5 1 5v29l-2 10-2 3h-5l-5-3-9-2-2-6-1-11-1-1h-9l-3 1-2 14-3 7-5 2-10-5-7-2-1-6v-57z" fill="#F9FAFA"/>
                        <path transform="translate(996,132)" d="m0 0h7l4 4 1 2v31l-2 48v87l1 52v17l-3 7-5 4-8 1 1-5v-25l-1-76v-51l1-44 3-51z" fill="#282828"/>
                        <path transform="translate(1868,414)" d="m0 0 7 3 10 9 9 7 4-1 8-7 10-9 5-2 2 2 1 17 7 2 2 4 1 13-1 22-1 7-3 3h-6l-9-3-4-2-2-16-1-2h-8l-4 4-3 16-4 5-6-1-9-4-5-3-1-3v-60z" fill="#F8F9F9"/>
                        <path transform="translate(857,133)" d="m0 0 7 1 9 6 11 6 12 11 7 10 6 12 4 20v25l-2 14-4 13-7 12-5 6-8 7-6 8-1 6 6 17 10 23 16 39 1 9-4 4-8 2-1-11-11-25-15-37-5-11-5-12v-5l16-16 9-14 5-13 3-14 1-11v-13l-1-11-6-21-7-13-9-10-8-7-10-6z" fill="#262B2E"/>
                        <path transform="translate(1817,414)" d="m0 0h21l8 1 1 1 2 11 3 3v6l-5 5h-4v10l5 6v10l3 12 1 1v6l-9 4h-15l-6-2-8-6-9-3-2-7-1-18-5-1-2-6 2-7 5-1 1-5 1-18 1-1z" fill="#FAFAFA"/>
                        <path transform="translate(981,414)" d="m0 0h2l1 2 1 17 7 2 3 7v15l-1 19-2 5-2 2-5-1-12-2-2-4-1-15h-9l-5 3-3 17-4 4-5-1-6-3-7-1-1-1-1-19v-23l1-22 5 1 13 11 8 6 4-1 10-9z" fill="#FBFBFB"/>
                        <path transform="translate(1634,414)" d="m0 0h24l8 14 6 5 8 16 10 24 1 4v7l-2 3h-6l-11-5-5-2-9 1-7 5-7 1-6-5-13-2-1-4 6-17 12-30-12-1-1-1v-12zm19 32-2 5h2l1-5z" fill="#FAFAFA"/>
                        <path transform="translate(1309,414)" d="m0 0h23l8 1-1 10 6 4 2 7-2 9-7 14-1 5 4 1 3 11 4 5v5l-5 3-4 1h-23l-5-3-4-5-13-2-2-4 5-10 12-22 2-5-3-3-1-4-13-2-1-2v-13z" fill="#FAFAFA"/>
                        <path transform="translate(791,413)" d="m0 0h12l7 3 9 7 2 6 2 3v6l-4 5h-2l1 5 10 15 1 4v9l-4 8-9 6-4 1h-8l-7-2-5-4-4-4-7-4-7-7-1-4 10-7 5 2 7 4h3l-5-5-1-5-4-2-6-4-5-6-2-7 1-9 4-7 6-5z" fill="#F9F9F9"/>
                        <path transform="translate(244,185)" d="m0 0h11l12 2 5 2-4 1h-14l-6 3-3 7-1 29v64l1 25 6 2 16 1 15-7 9-8v3l-10 9-13 6-16 2h-9l-11-2-3-2-1-4v-127l3-3 5-2z" fill="#252B2E"/>
                        <path transform="translate(1163,414)" d="m0 0 8 1 2 13 6 3 3 7 2 25 5 1 1-7 1-1h9l3 3 1 11 1 2 5 2 2 4-1 7-6 4-11 1h-13l-7-2-7-6-9-2-2-3v-61z" fill="#FAFAFA"/>
                        <path transform="translate(1130,190)" d="m0 0h7l12 3 2 2h-8l-12 3-10 7-7 8-7 13-4 18-1 17 3 19 4 12 4 10 4 5 5 5 3 2v2l4 2v1l-8-1-9-4-8-6-7-9-6-13-4-16-1-6v-19l3-16 6-15 6-8 8-8 8-5z" fill="#242D32"/>
                        <path transform="translate(1303,127)" d="m0 0 10 3 5 4 7 15 30 75 6 13 1 12-4 10-3 2-4-6-12-31-19-50-17-44z" fill="#232F36"/>
                        <path transform="translate(1508,415)" d="m0 0h15l1 2 1 9 1 2 5 3 3 7v40l-3 7-5 2-5-3v-2l-12-2-2-3v-61z" fill="#F9F9F9"/>
                        <path transform="translate(1767,426)" d="m0 0 5 5 4 6 1 5-1 8 3 6 4 7-1 10-8 11-7 4-9 3h-14l-10-4-11-9 2-1 6 2h16l9-3 8-6 6-9 2-6v-10l-17-1h-23v12l17 1v1l-12 1v3h8l8-5 2 1-6 5-6 2h-8l-8-5-4-8v-11l5-8 7-4h11l6 4 1 1 17 1z" fill="#252C2F"/>
                        <path transform="translate(676,131)" d="m0 0h8l5 4 2 5 3 27v23l-6 5-29-2-11-1-30-1-10 1-4 7-1 18 58 1v1l-42 2h-28l-2-2-1-5v-23l5-4h17l47 3 7 1h13l3-5-1-20z" fill="#232F35"/>
                        <path transform="translate(1408,271)" d="m0 0h1v23l-3 28-6 16-11 29-5 12-3 5-8 4h-7l1-5 22-63 14-39z" fill="#232E34"/>
                        <path transform="translate(1421,439)" d="m0 0h7l8 4 7 8 7 9 2 5v7l-4 8-6 4h-10l-6-3-8-6-8-7-3-5v-11l4-7 5-4z" fill="#FAFBFB"/>
                        <path transform="translate(1070,439)" d="m0 0h7l8 4 6 7 1 4 3 1 5 8 1 6-2 7-2 4-7 4h-10l-6-4-14-10-5-10 1-9 4-6 5-4z" fill="#FAFAFA"/>
                        <path transform="translate(1300,274)" d="m0 0 3 3 10 26 5 17 1 18-1 32-2 10-4 4-11 2-3-1 3-3v-70z" fill="#242D32"/>
                        <path transform="translate(1196,299)" d="m0 0h5l9 7 14 25 4 9-1 9-6 9-6 7-14 11-12 7-14 5-17 3-4-2 16-5 16-9 14-12 9-11 4-7v-7l-4-7-4-10-10-19z" fill="#223138"/>
                        <path transform="translate(778,298)" d="m0 0h19l2 2-5 2-2 3-1 5v14l2 37v16l-4 5-10 2v-15l-2-40-1-14v-16z" fill="#282828"/>
                        <path transform="translate(786,182)" d="m0 0 17 1 9 2 2 2h-12l-7 3-3 5-1 6v40l-1 2 23 2v1l-16 2h-11l-10-1-1-1v-32l1-28 5-3z" fill="#272829"/>
                        <path transform="translate(1171,126)" d="m0 0h7l15 8 11 7 13 10 8 9 1 5v9l-5 12-10 20-6 8-4 3h-6l-4-4 15-29 7-16v-8l-7-8-11-11-15-10-9-4z" fill="#272C2F"/>
                        <path transform="translate(904,428)" d="m0 0 4 4 7 8 4 10 1 3v12l-4 11-8 9-10 5-4 1h-13l-9-3-8-6-6-5h3l6 2h16l9-3 7-5 6-9 3-9v-12l-4-11z" fill="#27292A"/>
                        <path transform="translate(818,425)" d="m0 0 4 5 1 2v6l-4 5h-2l1 5 10 15 1 4v9l-4 8-9 6-4 1h-8l-7-2-5-4-3-5 14-1 7-3 5-6 2-4 1-10-3-9-5-4-15-5-4-4 2-5 5-2 11 5 5-3z" fill="#262A2C"/>
                        <path transform="translate(1269,425)" d="m0 0h2l3 5 4 3 2 6v36l-3 8-7 6-12 3-9-1-6-3-8-7v-1l18-1 7-2 5-5 3-7z" fill="#272828"/>
                        <path transform="translate(1828,318)" d="m0 0 3 1 6 11-2 5-11 18-12 19-7 9-8 4-7 1-3-2 8-11 17-29 14-23z" fill="#222F36"/>
                        <path transform="translate(686,319)" d="m0 0h7l6 5 1 4v9l-3 26-4 16-6 7-4 2-8-1 3-9 3-14 4-33z" fill="#223036"/>
                        <path transform="translate(1607,217)" d="m0 0 2 1 6 22v13l-6 22-1 2 9 3 1 2-6 1h-12l-9-2-1-1 1-8 8-29z" fill="#242D31"/>
                        <path transform="translate(1663,425)" d="m0 0 7 6 6 9 7 17 5 11 3 9v7l-2 3h-6l-11-5-5-2-9 1-7 5-7 1-6-5-4-2 6-1 2-9 1-3 2-1h19l3 5 2 7h14l-1-5-11-26-8-20z" fill="#262A2C"/>
                        <path transform="translate(676,222)" d="m0 0 9 1 3 6v15l-3 33-3 7-6 3-8 1 2-3 3-42z" fill="#282828"/>
                        <path transform="translate(1787,125)" d="m0 0 5 1 8 5 6 4 6 7 14 22 9 14v4l2 1-5 9h-4l-12-20-8-13-14-23z" fill="#242D32"/>
                        <path transform="translate(1846,423)" d="m0 0 2 1 3 5 1 1v6l-5 5h-4v10l5 6-1 9-28-1v-12l20-1 1-12h-20l-1-1v-10l4-1h23z" fill="#272828"/>
                        <path transform="translate(1574,347)" d="m0 0h53l15 1v1l-51 1-4 5-7 21-4 6-5 3-14 2h-36v-1l27-1 11-1 3-3 5-16 4-15z" fill="#1F3540"/>
                        <path transform="translate(1909,440)" d="m0 0h1v21l-2 2-1-2h-8l-4 4-3 16-4 5-6-1-8-4 3-2h4v-38l4 2 8 7 5-1 10-8z" fill="#27292A"/>
                        <path transform="translate(943,440)" d="m0 0 7 6 5 4 6-1 9-8h2v11l-2 9h-9l-5 3-3 17-4 4-5-1-5-4 2-1 1-38z" fill="#252B2E"/>
                        <path transform="translate(593,187)" d="m0 0h17l20 2v2h-12l-10 1-4 7-1 18 58 1v1l-42 2h-28l-2-2-1-5v-23z" fill="#242D31"/>
                        <path transform="translate(1559,441)" d="m0 0 8 6 6 4 13-10h1v14h-2v6l-10 1-3 1-2 14-3 7-5 2-9-5 2-2h3v-22z" fill="#252B2E"/>
                        <path transform="translate(871,429)" d="m0 0h11l6 4 4 5 1 4-13 3-4 2-2 5-1 1v7l1 4-6-1-7-6-2-4v-12l4-7 5-4z" fill="#26292B"/>
                        <path transform="translate(1337,424)" d="m0 0 8 5 2 7-2 9-7 14-1 5 2 1h-21l3-9 15-31z" fill="#272829"/>
                        <path transform="translate(1524,426)" d="m0 0 7 5 3 7v40l-3 7-5 2-5-3v-2l-4-2 5-1 1-51z" fill="#272829"/>
                        <path transform="translate(1600,427)" d="m0 0h1v5l6 1 3 5 1 5v29l-2 10-2 3h-5l-8-4 2-2h3v-41z" fill="#232E33"/>
                        <path transform="translate(983,429)" d="m0 0h2v4l7 2 3 7v15l-1 19-2 5-2 2-10-2 2-2z" fill="#27292A"/>
                        <path transform="translate(1923,430)" d="m0 0 1 3 7 2 2 4 1 13-1 22-1 7-3 3h-6l-6-3 2-2h3v-40z" fill="#232F36"/>
                        <path transform="translate(589,285)" d="m0 0h40v1l-14 1h-12l-1 26-1 6-8-1-4-3-1-5v-24z" fill="#27292A"/>
                        <path transform="translate(1202,466)" d="m0 0 3 6 5 2 2 4-1 7-6 4-11 1h-13l-7-2-8-7v-1l6-1h29z" fill="#262A2D"/>
                        <path transform="translate(1441,450)" d="m0 0 5 5 4 5 2 5v7l-4 8-6 4h-10l-6-3-8-6-2-2h11l6-2 5-4 3-7z" fill="#262A2C"/>
                        <path transform="translate(1090,450)" d="m0 0 2 4 3 1 5 8 1 6-2 7-2 4-7 4h-10l-15-10 4-1h7l8-3 4-5 2-7z" fill="#262A2C"/>
                        <path transform="translate(1663,425)" d="m0 0 7 6 6 9 7 17 5 11 3 9v7l-2 3h-6l-11-5v-2l11-2-1-5-11-26-8-20z" fill="#26292A"/>
                        <path transform="translate(1340,468)" d="m0 0h2l2 8 4 5v5l-5 3-4 1h-23l-5-3-4-5-2-2 3-1h32z" fill="#272829"/>
                        <path transform="translate(1238,422)" d="m0 0 2 4 4 5 4 4 2 7 1 22-2 1h-7l-3-2-2-7v-24z" fill="#262A2D"/>
                        <path transform="translate(1171,422)" d="m0 0h1l2 7 5 2 3 7 1 10v16l-2 1h-10l-1-2v-25z" fill="#242E33"/>
                        <path transform="translate(1456,122)" d="m0 0h19l3 6-1 1-4 114v24l1 37v27h-1l-2-35v-77l2-42 1-42v-8l-4-2h-11l-5 1h-19l-3-3z" fill="#D7D7D7"/>
                        <path transform="translate(533,123)" d="m0 0 53 1h22l31-1h25l8 1v1l-36 2h-114l-3 1 1-3 2-1z" fill="#E4E4E4"/>
                        <path transform="translate(1847,467)" d="m0 0h1l3 12 1 1v6l-9 4h-15l-6-2-9-7v-1l5-1 27-1 1-10z" fill="#242D31"/>
                        <path transform="translate(1846,423)" d="m0 0h1l1 5v8l-6 4h-22l-1-1v-10l4-1h23z" fill="#232F35"/>
                        <path transform="translate(1184,288)" d="m0 0 5 2 5 5 3 2-4 1-1 3-6-7-5 1-13 13-10 6-11 4-11 1-11-6-3-3 10 3 14-1 12-4 10-7 14-12z" fill="#D9D9D9"/>
                        <path transform="translate(253,188)" d="m0 0h12v1l-11 1-6 3-3 7-1 29v64l1 25 6 2 16 1 15-7 9-8v3l-10 9-13 6-16 2h-9v-1l7-2-8-4v-108l1-14 4-6z" fill="#016597"/>
                        <path transform="translate(668,312)" d="m0 0h15l1 2-12 3-22 2h-41l-6-3v-3l4 1h41z" fill="#D7D7D7"/>
                        <path transform="translate(190,123)" d="m0 0h61l27 2v3l-25-1-58-1-16-1v-1z" fill="#CED2D4"/>
                        <path transform="translate(1269,425)" d="m0 0h2l3 5 4 3 2 6v36l-3 8-7 6-12 3-9-1-6-3-8-7v-1h6v3l5 4 8 2 11-1 9-6 3-7v-34l-3-7-5-4z" fill="#016597"/>
                        <path transform="translate(1787,257)" d="m0 0h2l-1 5-14 22-8 12-8 11-11 17-4 5h-2l1-4 7-11 12-17 13-19 10-15z" fill="#DCDCDC"/>
                        <path transform="translate(301,288)" d="m0 0 1 4-6 12-8 6-7 6-14 6-16-1-7-3 1-2 4 2h10l11-2 14-7 9-9 5-8h2z" fill="#DBDCDD"/>
                        <path transform="translate(910,436)" d="m0 0 6 5 4 12v12l-4 11-8 9-10 5-4 1h-13l-9-3-8-6-1-2 4 1 5 4 8 3h14l10-4 8-7 4-8 1-4v-12l-4-11-3-4z" fill="#016597"/>
                        <path transform="translate(1269,122)" d="m0 0h32l3 3v8l-3-4-2-3-40 1-11-2 4-2z" fill="#D7D7D7"/>
                        <path transform="translate(985,433)" d="m0 0 7 2 3 7v15l-1 19-2 5-2 2-10-2 5-4h2l3-12 1-2 1-9v-12l-2-4-5-3z" fill="#016597"/>
                        <path transform="translate(1743,123)" d="m0 0h44l2 2-1 2-10 1h-23l-8-1-4-2z" fill="#D8D8D8"/>
                        <path transform="translate(1924,433)" d="m0 0 7 2 2 4 1 13-1 22-1 7-3 3h-6l-4-3 8-2 3-18v-20l-5-5z" fill="#016597"/>
                        <path transform="translate(1524,426)" d="m0 0 7 5 3 7v40l-3 7-5 2-5-3v-2l-2-1 4 1 5 1 2-3 1-7v-33l-3-7-3-2-2 3v-6z" fill="#016597"/>
                        <path transform="translate(1601,432)" d="m0 0 6 1 3 5 1 5v29l-2 10-2 3h-5l-8-4 4-2v2h8l2-26v-12l-2-6-5-3z" fill="#016597"/>
                        <path transform="translate(1775,450)" d="m0 0 2 3 5 7 1 9-3 7-6 8-7 4-9 3h-14l-10-4-8-6 3-1 8 6 6 2h15l11-4 7-6 4-8-1-9-4-5z" fill="#016597"/>
                        <path transform="translate(1666,429)" d="m0 0 4 2 6 9 7 17 5 11 3 9v7l-2 3h-6l-11-5 3-1 5 2 9 1-2-11-5-12-8-19-8-12z" fill="#016597"/>
                        <path transform="translate(821,455)" d="m0 0 5 4 3 8v9l-4 8-9 6-4 1h-8l-7-2-5-4-3-5h8l-3 1 3 5 7 2h7l9-4 3-3h2l1-5v-11l-5-8z" fill="#036697"/>
                        <path transform="translate(1203,470)" d="m0 0 5 3 3 3 1 5-2 5-5 3-11 1h-13l-7-2-5-5h3l8 4 24-1 4-3v-6l-4-2z" fill="#016597"/>
                        <path transform="translate(958,458)" d="m0 0h10l2 1v2h-9l-5 3-3 17-4 4-5-1-5-4 3-1 7 2 2-14 3-7z" fill="#016597"/>
                        <path transform="translate(639,123)" d="m0 0h25l8 1v1l-36 2h-11l-1-1-16-1v-1z" fill="#DFDFDF"/>
                        <path transform="translate(1575,458)" d="m0 0h10v3l-10 1-3 1-2 14-3 7-5 2-9-5 4-2 3 2 5 1 4-19 3-4z" fill="#016597"/>
                        <path transform="translate(1129,117)" d="m0 0 21 1 17 4v1l-12-1-15-2h-19l-15 2-15 5-5 1 4-3 14-5 11-2z" fill="#DBDBDB"/>
                        <path transform="translate(1897,458)" d="m0 0h10 3l-1 5-2-2h-8l-4 4-3 16-4 5-6-1-3-3h9l3-17 4-6z" fill="#016597"/>
                        <path transform="translate(1342,474)" d="m0 0 5 5 1 7-5 3-4 1h-23l-5-3-4-5-2-2 7-1-3 1 3 5 4 2h20l7-1 1-4-2-5z" fill="#016495"/>
                        <path transform="translate(1880,123)" d="m0 0h37l-3 2 3 2h-24l-19-1-1-2z" fill="#D7D7D7"/>
                        <path transform="translate(1408,267)" d="m0 0h2l1 4-1 32-2 24-1 5h-1l-1-10 3-28v-22l-4 9-1-3z" fill="#D7D7D7"/>
                        <path transform="translate(831,211)" d="m0 0h1v13l-3 10-5 6-9 4-15 1-10-2 1-3 1 2h14l10-2 6-3 5-5 3-10z" fill="#D9D9D9"/>
                        <path transform="translate(665,214)" d="m0 0h8v1l-18 3h-52v-3l4 1h22z" fill="#D8D8D8"/>
                        <path transform="translate(1849,477)" d="m0 0 3 3v6l-9 4h-15l-6-2-4-4 4 1 3 1h18l6-2z" fill="#016597"/>
                        <path transform="translate(1239,426)" d="m0 0 7 6 3 5 1 5 1 22-3-1-2-19-3-8-4-7z" fill="#016597"/>
                        <path transform="translate(408,350)" d="m0 0 1 2-7 10-6 7h-2v2l-4 1 2-7 12-12z" fill="#E1E1E1"/>
                        <path transform="translate(1608,275)" d="m0 0 1 2h14l1 5-4 2h-22l-8-2-2-4 2-2 1 4 9 2h12l5-1-10-4z" fill="#D7D7D7"/>
                        <path transform="translate(1664,476)" d="m0 0 5 2 7 1-4 2-11-1-9 5-7 2-6-4-5-2 2-2h5l3 4 7-1 6-4z" fill="#016495"/>
                        <path transform="translate(1444,454)" d="m0 0 5 4 3 7v7l-4 8-6 4h-10l-6-3-3-4 8 4h9l6-3 3-5v-7l-3-7z" fill="#016597"/>
                        <path transform="translate(1172,428)" d="m0 0 7 3 3 7 1 10v16h-2l-2-24-1-5-5-2z" fill="#016597"/>
                        <path transform="translate(1736,373)" d="m0 0h1l-1 7-10 6-9 1h-44v-1l33-1 21-2 7-5z" fill="#134761"/>
                        <path transform="translate(1337,424)" d="m0 0 8 5 2 7-2 9-7 14-1 5-3-1 1-5 7-14 1-3v-11l-5-2-2-3z" fill="#016597"/>
                        <path transform="translate(1625,119)" d="m0 0h7l5 2 2 3v5l-4-5-2-1-36-1-4-2h21z" fill="#D9D9D9"/>
                        <path transform="translate(788,452)" d="m0 0 9 1 6 5 1 3-1 2-6 1-5-5v-4l-4-2z" fill="#086797"/>
                        <path transform="translate(1092,454)" d="m0 0 3 1 5 8 1 6-2 7-2 4-7 4h-10l-6-4-1-2 4 2 3 1h10l5-3 3-6-1-10z" fill="#016597"/>
                        <path transform="translate(797,186)" d="m0 0h5l-4 2-5 4-2 9v40l-1 2-3-1 2-3-1-18 1-25 4-8z" fill="#016597"/>
                        <path transform="translate(884,440)" d="m0 0 9 1v1l-13 3-4 2-2 5-1 1v7l1 4h-3l-1-2v-9l4-7 5-4z" fill="#016597"/>
                        <path transform="translate(274,126)" d="m0 0h10l19 5 10 4-2 3-15-6-11-3-11-2z" fill="#558196"/>
                        <path transform="translate(1758,304)" d="m0 0v3l-11 17-4 5h-2l1-4 7-11 5-7z" fill="#DEDEDE"/>
                        <path transform="translate(1847,424)" d="m0 0 4 5 1 1v6l-5 5h-4l-1 10h-1l-1-11 7-4z" fill="#016597"/>
                        <path transform="translate(818,425)" d="m0 0 4 5 1 2v6l-4 5h-2v4l-4-2 2-4 4-4 1-3-3-4z" fill="#016495"/>
                        <path transform="translate(328,143)" d="m0 0 10 6 10 8 4 3v2l3 1 5 6-1 2-6-7-13-10v-2l-5-2-7-5z" fill="#0A6A99"/>
                        <path transform="translate(1654,439)" d="m0 0 2 2 4 10v2h-10l1-4v2h2l-1-7z" fill="#24343D"/>
                        <path transform="translate(1305,430)" d="m0 0h13l-2 5-4 4-4-3-1-4z" fill="#26292B"/>
                        <path transform="translate(255,124)" d="m0 0h14l9 1v3l-22-1-2-2z" fill="#DADADA"/>
                        <path transform="translate(1176,294)" d="m0 0h2l-2 4-6 6-3 1-4 4-7 1 5-4 11-8z" fill="#FAFAFA"/>
                        <path transform="translate(1586,440)" d="m0 0h2v28l-1 6h-1l-1-11-1-2 1-6h2z" fill="#D7D7D7"/>
                        <path transform="translate(297,380)" d="m0 0h3v3l-25 4h-6v-2l13-1z" fill="#174157"/>
                        <path transform="translate(1842,451)" d="m0 0 5 4 1 5-1 6-4-1v-8l-1-1z" fill="#016597"/>
                        <path transform="translate(877,143)" d="m0 0 5 2 9 7 7 7 5 8-1 2-8-11-11-10-6-4z" fill="#016597"/>
                        <path transform="translate(971,440)" d="m0 0h2v22l-1 10h-1l-1-13 1-7z" fill="#D7D7D7"/>
                        <path transform="translate(533,123)" d="m0 0 10 1-2 2-19 1-3 1 1-3 2-1z" fill="#EBEBEB"/>
                        <path transform="translate(1787,257)" d="m0 0h2l-1 5-9 14-3 1 2-5 7-11z" fill="#ddd"/>
                        <path transform="translate(821,455)" d="m0 0 5 4 3 8v9l-1 3h-2v-14l-5-8z" fill="#016597"/>
                        <path transform="translate(1802,454)" d="m0 0h3v23h-1l-2-17z" fill="#788F9B"/>
                        <path transform="translate(1070,137)" d="m0 0 2 1-19 19v-3l11-12z" fill="#89B1C4"/>
                        <path transform="translate(607,190)" d="m0 0h11v1l-10 1-4 7-1 17h-1v-19l3-6z" fill="#016597"/>
                        <path transform="translate(1189,460)" d="m0 0h1v5l-7 2h-12l-1-4 1 2 10-1 3-1 5 1z" fill="#D7D7D7"/>
                        <path transform="translate(1787,125)" d="m0 0 5 1 8 5 6 4 4 4-1 2-8-7-7-3-5-4z" fill="#2377A1"/>
                        <path transform="translate(1638,124)" d="m0 0 5 2 8 4 4 5 2 4-1 3-5-9-4-3-6-2-2 1z" fill="#0B6A9A"/>
                        <path transform="translate(667,215)" d="m0 0h9v3h-14v-2z" fill="#233B47"/>
                        <path transform="translate(1608,278)" d="m0 0 9 2 1 2-6 1h-12v-1l9-1 1-1z" fill="#016597"/>
                        <path transform="translate(1777,276)" d="m0 0v3l-6 9-4 2 2-4 5-8z" fill="#DADADA"/>
                        <path transform="translate(831,211)" d="m0 0h1v13l-3 10-3 1 2-5 2-8z" fill="#E5E5E5"/>
                        <path transform="translate(1305,430)" d="m0 0h5l3 5 1 3-2 1-4-3-1-4z" fill="#076898"/>
                        <path transform="translate(603,215)" d="m0 0 4 1 22 1v1h-26z" fill="#D7D7D7"/>
                        <path transform="translate(1111,298)" d="m0 0 5 5 4 5 4 4h-3l-5-5-5-7z" fill="#076899"/>
                        <path transform="translate(1366,234)" d="m0 0 1 3-4 12-2-4v-6h3z" fill="#D7D7D7"/>
                        <path transform="translate(791,453)" d="m0 0h6l6 5 1 3-2 1-1-3-10-5z" fill="#242E33"/>
                        <path transform="translate(1176,294)" d="m0 0h2l-2 4-6 6-3-1z" fill="#FDFDFD"/>
                        <path transform="translate(300,132)" d="m0 0h6l7 3-2 3-11-5z" fill="#3B5764"/>
                        <path transform="translate(1772,433)" d="m0 0 4 4 1 5-1 7h-1l-2-12z" fill="#016597"/>
                        <path transform="translate(948,428)" d="m0 0 4 2 4 3 4-1 2-1-2 4-4 1-8-7z" fill="#C0CAD0"/>
                        <path transform="translate(1736,373)" d="m0 0h1l-1 7-8 5-2-1 8-6z" fill="#016597"/>
                        </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel é wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
