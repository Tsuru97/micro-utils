@extends('layouts.public')
@section('title') Privacy Policy @endsection
@section('content')

<section class="section mt-5">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="bg-info-subtle position-relative"> <!-- Color sutil diferente para distinguir de T&C -->
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h3>Privacy Policy</h3>
                            <p class="mb-0 text-muted">Last update: {{ date('d M, Y') }}</p>
                        </div>
                    </div>
                    <div class="shape">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none"
                            viewBox="0 0 1440 60">
                            <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z"
                                    style="fill: var(--vz-secondary-bg);"></path>
                            </g>
                            <defs>
                                <mask id="SvgjsMask1001">
                                    <rect width="1440" height="60" fill="#ffffff"></rect>
                                </mask>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div>
                        <h5>1. Introduction</h5>
                        <p class="text-muted">At <strong>Micro-Utils.com</strong>, accessible from our website, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Micro-Utils.com and how we use it.</p>
                        <p class="text-muted">If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>
                    </div>

                    <div>
                        <h5>2. Log Files</h5>
                        <p class="text-muted">Micro-Utils.com follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this as part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks.</p>
                        <p class="text-muted">These log files are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking and analyzing user behavior on the website, and generating lead reports.</p>
                    </div>

                    <div>
                        <h5>3. Cookies and Web Beacons</h5>
                        <p class="text-muted">Like any other website, Micro-Utils.com uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>
                    </div>

                    <div>
                        <h5>4. Google DoubleClick DART Cookie</h5>
                        <p class="text-muted">Google is one of the third-party vendors on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.micro-utils.com and other sites on the internet.</p>
                        <p class="text-muted">However, visitors can choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL: <a href="https://policies.google.com/technologies/ads" target="_blank" class="text-primary">https://policies.google.com/technologies/ads</a></p>
                    </div>

                    <div>
                        <h5>5. Handling of User Data & Files</h5>
                        <p class="text-muted">Our platform provides various tools, including file converters (such as PDF tools). To ensure your privacy, we follow these strict guidelines:</p>
                        <ul class="text-muted vstack gap-2">
                            <li><strong>No Permanent Storage:</strong> Any files uploaded to our servers for processing are stored temporarily and are automatically deleted after the process is completed or after a short period of time.</li>
                            <li><strong>No Data Selling:</strong> We do not sell, trade, or otherwise transfer to outside parties any personally identifiable information.</li>
                            <li><strong>Client-Side Processing:</strong> Whenever possible, we use client-side JavaScript to process data directly in your browser, meaning your data never even reaches our servers.</li>
                        </ul>
                    </div>

                    <div>
                        <h5>6. Third-Party Privacy Policies</h5>
                        <p class="text-muted">Micro-Utils.com's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>
                    </div>

                    <div>
                        <h5>7. Consent</h5>
                        <p class="text-muted">By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
                    </div>

                    <div class="text-end hstack gap-2 justify-content-end">
                        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    </div>
</section>

@endsection
