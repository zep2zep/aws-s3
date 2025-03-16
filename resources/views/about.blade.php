@extends('layouts.app')

@section('content')
    <div class="relative h-screen w-screen">
        <img id="background" class="absolute left-0 top-0 h-full w-full object-cover"
            src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" />

        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <!-- <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                                    fill="currentColor" />
                            </svg> -->
                    </div>

                </header>

                <main class="mt-2">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <div
                            class="flex flex-col items-center gap-6 overflow-hidden rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">

                            <div id="screenshot-container"
                                class="relative flex w-full flex-1 flex-col items-center text-left">
                                <h1 class="mb-4 text-center text-2xl font-bold md:text-3xl lg:text-4xl">About Us</h1>

                                <p class="text-left text-lg md:text-xl lg:text-2xl">
                                    Welcome to our website! We are dedicated to providing you with the best experience
                                    possible. Our team is passionate about delivering high-quality content and services to
                                    our users.
                                </p>

                                <p class="mt-4 text-left text-lg md:text-xl lg:text-2xl">
                                    This project is powered by <a href="https://laravel.com" target="_blank"
                                        style="color: red; text-decoration: underline;">Laravel</a>,
                                    a robust PHP framework that allows us to build modern web applications with ease. Our
                                    data is securely stored using
                                    <a href="https://aiven.io" target="_blank"
                                        style="color: red; text-decoration: underline;">two MySQL databases hosted on
                                        Aiven</a>, ensuring reliability and performance:
                                </p>

                                <ul class="mt-2 list-disc pl-6 text-lg md:text-xl lg:text-2xl">
                                    <li><strong>Primary Database:</strong> mysql-1ecee2df-aoxoeoxoa-6672.l.aivencloud.com
                                    </li>
                                    <li><strong>Secondary Database:</strong> mysql-78fcfec-fattarelli-bc65.a.aivencloud.com
                                    </li>
                                </ul>

                                <p class="mt-4 text-left text-lg md:text-xl lg:text-2xl">
                                    In addition, all user images and media are safely stored using <a
                                        href="https://aws.amazon.com/s3/" target="_blank"
                                        style="color: red; text-decoration: underline;">AWS S3</a>,
                                    one of the most reliable cloud storage solutions available.
                                </p>

                                <p class="mt-4 text-left text-lg md:text-xl lg:text-2xl">
                                    Our project is also deployed on <a href="https://vercel.com" target="_blank"
                                        style="color: red; text-decoration: underline;">Vercel</a>, ensuring fast and
                                    scalable hosting for a smooth
                                    user experience.
                                </p>

                                <h2 class="mt-6 text-center text-xl font-semibold md:text-2xl lg:text-3xl">Additional
                                    Features</h2>

                                <ul class="mt-4 list-disc pl-6 text-lg md:text-xl lg:text-2xl">
                                    <li>✅ <strong>Database Connection Test:</strong> Verify the status of both primary and
                                        secondary databases using the <em>Test Connessione</em> tool.</li>
                                    <li>📋 <strong>Log Accessi:</strong> View user access logs for transparency and
                                        security.</li>
                                    <li>🔄 <strong>Reset Log Accessi:</strong> Clear the access logs when necessary to keep
                                        the database clean.</li>
                                </ul>

                                <p class="mt-4 text-left text-lg md:text-xl lg:text-2xl">
                                    Our mission is to create value through innovation and customer satisfaction. Thank you
                                    for visiting and being part of our journey!
                                </p>
                            </div>

                            <div class="relative mt-6 flex flex-col items-center gap-6 lg:items-end">
                                <div class="pt-3 sm:pt-5 lg:pt-0">
                                    <!-- Sposta l'href sull'elemento h2 -->
                                    <a href="https://laravel.com/docs"
                                        class="flex items-center gap-2 text-center text-xl font-semibold">
                                        <h2>Documentation</h2>

                                        <!-- Sposta anche l'icona SVG all'interno dell'ancora -->
                                        <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>
                                    </a>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laravel has wonderful documentation covering every aspect of the framework. Whether
                                        you are a newcomer or have prior experience with Laravel, we recommend reading our
                                        documentation from beginning to end.
                                    </p>
                                </div>
                            </div>

                        </div>


                        <!-- Laracasts -->
                        <a href="https://laracasts.com"
                            class="flex items-start gap-4 rounded-lg p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <g fill="#FF2D20">
                                        <path
                                            d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z" />
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold">Laracasts</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript
                                    development. Check them out, see for yourself, and massively level up your development
                                    skills in the process.
                                </p>
                            </div>

                            <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>
                        <!-- ravel news -->
                        <a href="https://laravel-news.com"
                            class="flex items-start gap-4 rounded-lg bg-slate-950 p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <g fill="#FF2D20">
                                        <path
                                            d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z" />
                                        <path
                                            d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z" />
                                        <path
                                            d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z" />
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold">Laravel News</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest
                                    and most important news in the Laravel ecosystem, including new package releases and
                                    tutorials.
                                </p>
                            </div>

                            <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <!-- Vibrant Ecosystem -->
                        <div
                            class="flex items-start gap-4 rounded-lg bg-red-500 p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <g fill="#FF2D20">
                                        <path
                                            d="M16.597 12.635a.247.247 0 0 0-.08-.237 2.234 2.234 0 0 1-.769-1.68c.001-.195.03-.39.084-.578a.25.25 0 0 0-.09-.267 8.8 8.8 0 0 0-4.826-1.66.25.25 0 0 0-.268.181 2.5 2.5 0 0 1-2.4 1.824.045.045 0 0 0-.045.037 12.255 12.255 0 0 0-.093 3.86.251.251 0 0 0 .208.214c2.22.366 4.367 1.08 6.362 2.118a.252.252 0 0 0 .32-.079 10.09 10.09 0 0 0 1.597-3.733ZM13.616 17.968a.25.25 0 0 0-.063-.407A19.697 19.697 0 0 0 8.91 15.98a.25.25 0 0 0-.287.325c.151.455.334.898.548 1.328.437.827.981 1.594 1.619 2.28a.249.249 0 0 0 .32.044 29.13 29.13 0 0 0 2.506-1.99ZM6.303 14.105a.25.25 0 0 0 .265-.274 13.048 13.048 0 0 1 .205-4.045.062.062 0 0 0-.022-.07 2.5 2.5 0 0 1-.777-.982.25.25 0 0 0-.271-.149 11 11 0 0 0-5.6 2.815.255.255 0 0 0-.075.163c-.008.135-.02.27-.02.406.002.8.084 1.598.246 2.381a.25.25 0 0 0 .303.193 19.924 19.924 0 0 1 5.746-.438ZM9.228 20.914a.25.25 0 0 0 .1-.393 11.53 11.53 0 0 1-1.5-2.22 12.238 12.238 0 0 1-.91-2.465.248.248 0 0 0-.22-.187 18.876 18.876 0 0 0-5.69.33.249.249 0 0 0-.179.336c.838 2.142 2.272 4 4.132 5.353a.254.254 0 0 0 .15.048c1.41-.01 2.807-.282 4.117-.802ZM18.93 12.957l-.005-.008a.25.25 0 0 0-.268-.082 2.21 2.21 0 0 1-.41.081.25.25 0 0 0-.217.2c-.582 2.66-2.127 5.35-5.75 7.843a.248.248 0 0 0-.09.299.25.25 0 0 0 .065.091 28.703 28.703 0 0 0 2.662 2.12.246.246 0 0 0 .209.037c2.579-.701 4.85-2.242 6.456-4.378a.25.25 0 0 0 .048-.189 13.51 13.51 0 0 0-2.7-6.014ZM5.702 7.058a.254.254 0 0 0 .2-.165A2.488 2.488 0 0 1 7.98 5.245a.093.093 0 0 0 .078-.062 19.734 19.734 0 0 1 3.055-4.74.25.25 0 0 0-.21-.41 12.009 12.009 0 0 0-10.4 8.558.25.25 0 0 0 .373.281 12.912 12.912 0 0 1 4.826-1.814ZM10.773 22.052a.25.25 0 0 0-.28-.046c-.758.356-1.55.635-2.365.833a.25.25 0 0 0-.022.48c1.252.43 2.568.65 3.893.65.1 0 .2 0 .3-.008a.25.25 0 0 0 .147-.444c-.526-.424-1.1-.917-1.673-1.465ZM18.744 8.436a.249.249 0 0 0 .15.228 2.246 2.246 0 0 1 1.352 2.054c0 .337-.08.67-.23.972a.25.25 0 0 0 .042.28l.007.009a15.016 15.016 0 0 1 2.52 4.6.25.25 0 0 0 .37.132.25.25 0 0 0 .096-.114c.623-1.464.944-3.039.945-4.63a12.005 12.005 0 0 0-5.78-10.258.25.25 0 0 0-.373.274c.547 2.109.85 4.274.901 6.453ZM9.61 5.38a.25.25 0 0 0 .08.31c.34.24.616.561.8.935a.25.25 0 0 0 .3.127.631.631 0 0 1 .206-.034c2.054.078 4.036.772 5.69 1.991a.251.251 0 0 0 .267.024c.046-.024.093-.047.141-.067a.25.25 0 0 0 .151-.23A29.98 29.98 0 0 0 15.957.764a.25.25 0 0 0-.16-.164 11.924 11.924 0 0 0-2.21-.518.252.252 0 0 0-.215.076A22.456 22.456 0 0 0 9.61 5.38Z" />
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-gray-400">Vibrant Ecosystem</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Laravel's robust library of first-party tools and libraries, such as <a
                                        href="https://forge.laravel.com"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white dark:focus-visible:ring-[#FF2D20]">Forge</a>,
                                    <a href="https://vapor.laravel.com"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Vapor</a>,
                                    <a href="https://nova.laravel.com"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Nova</a>,
                                    <a href="https://envoyer.io"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Envoyer</a>,
                                    and <a href="https://herd.laravel.com"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Herd</a>
                                    help you take your projects to the next level. Pair them with powerful open source
                                    libraries like <a href="https://laravel.com/docs/billing"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Cashier</a>,
                                    <a href="https://laravel.com/docs/dusk"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Dusk</a>,
                                    <a href="https://laravel.com/docs/broadcasting"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Echo</a>,
                                    <a href="https://laravel.com/docs/horizon"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Horizon</a>,
                                    <a href="https://laravel.com/docs/sanctum"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Sanctum</a>,
                                    <a href="https://laravel.com/docs/telescope"
                                        class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Telescope</a>,
                                    and more.
                                </p>
                            </div>
                        </div>
                        <!-- ravel news 3-->
                        <div
                            class="flex items-start gap-4 rounded-lg bg-slate-950 p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <g fill="#FF2D20">
                                        <path
                                            d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z" />
                                        <path
                                            d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z" />
                                        <path
                                            d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="relative mt-5 flex flex-col items-center gap-6 lg:items-end">
                                <div class="pt-1 sm:pt-0 lg:pt-0">

                                    <h2>Caricare profile image</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Dopo la registrazione con un idirizzo email immaginario ma con regole
                                        nome@nome.dominio con una password minimo 8 caratteri
                                        aprire USER dal menu e selezionare un immagine png jpeg jpg non superiore ai 2Mb.
                                    </p>
                                </div>
                            </div>

                        </div>


                        <!-- Vite-->
                        <div
                            class="flex items-start gap-4 rounded-lg bg-slate-950 p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg version="1.1" id="svg1" width="34.133331" height="34.133331"
                                    viewBox="0 0 34.133331 34.133331" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <defs id="defs1" />
                                    <g id="g1">
                                        <image width="34.133331" height="34.133331" preserveAspectRatio="none"
                                            style="image-rendering:optimizeQuality"
                                            xlink:href="data:image/png;base64,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&#10;"
                                            id="image1" />
                                    </g>
                                </svg>


                            </div>


                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold">Documentazione Vite</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    E' ancora in allestimento
                                </p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-yellow-300">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    <br>
                    <p>By @sestapertica</p>
                </footer>
            </div>
        </div>
    </div>
@endsection
