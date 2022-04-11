<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terms & Conditions') }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="h-screen overflow-auto py-12 px-12">                    
                    <p class="font-bold text-xl">Introduction</p>                        
                    <p>
                        These Website Standard Terms and Conditions written on this webpage shall manage your use of our website.
                        These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions. These Terms and Conditions have been generated with the help of the Terms And Conditiions Sample Generator.
                        Minors or people below 18 years old are not allowed to use this Website.
                    </p>

                    <br>

                    <p class="font-bold text-xl">Intellectual Property Rights</p>
                    <p>
                        Other than the content you own, under these Terms, Uitm and/or its licensors own all the intellectual property rights and materials contained in this Website.
                        You are granted limited license only for purposes of viewing the material contained on this Website.
                    </p>   

                    <br>

                    <p class="font-bold text-xl">Restrictions</p>
                    <p>
                        You are specifically restricted from all of the following:
                    </p>
                    <br>
                    <ul class="list-disc ml-12">
                        <li>publishing any Website material in any other media;</li>
                        <li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
                        <li>publicly performing and/or showing any Website material;</li>
                        <li>using this Website in any way that is or may be damaging to this Website;</li>
                        <li>using this Website in any way that impacts user access to this Website;</li>
                        <li>using this Website contrary to applicable laws and regliations, or in any way may cause harm to the Website, or to any person or business entity;</li>
                        <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
                        <li>using this Website to engage in any advertising or marketing.</li>
                    </ul>
                    <br>
                    <p>Certain areas of this Website are restricted from being access by you and Uitm may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>

                    <br>
                        
                    <p class="font-bold text-xl">Your Content</p>
                    <p>
                        In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Uitm a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                    </p>
                    <p>
                        Your Content must be your own and must not be invading any third-party’s rights. Uitm reserves the right to remove any of Your Content from this Website at any time without notice.
                    </p>

                    <br>

                    <p class="font-bold text-xl">Your Privacy</p>
                    <p>
                        Please read <a href="{{ route('policy') }}" class="text-blue-500">Privacy Policy.</a>
                    </p>
                </div>
                <div class="flex justify-center my-7 text-center">
                    <div class="form-check">
                        <form>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                I have read all the terms stated above.
                            </label>
                            <br>
                            <button class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out mt-6">
                                <i class="" aria-hidden="true"></i>I Agree
                            </button>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</x-app-layout>