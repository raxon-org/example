<section name="main">
    <div class="logo">
        <a href="https://www.raxon.org/" title="https://www.raxon.org"><img src="{{config('domain.url')}}Icon/android-chrome-192x192.png" alt="Raxon Logo"></a>
    </div>
    <h1><a href="https://www.raxon.org/" title="https://www.raxon.org/">{{literal}}<strong>{{</strong>RAXON<strong>}}</strong>{{/literal}}</a></h1>

    <h3>About</h3>
    <p>
        raxon/framework is a robust, high-performance PHP framework that streamlines the process of developing comprehensive websites and applications. <br>
        Here are some key attributes that distinguish this framework: <br>
    </p>
    <ol>
    <li>
        <p>
            <b>Rapid Performance:</b><br>
            The utilization of the ramdisk by the framework ensures speedy performance, resulting in enhanced efficiency and user experience.<br>
        </p>
    </li>
    <li>
        <p>
            <b>Package Compatibility:</b><br>
            The framework flaunts interoperability with a multitude of other packages, such as the symfony-mailer and doctrine, which fosters versatility and eases the task of integrating different functionalities in your application.<br>
        </p>
    </li>
    <li>
        <p>
            <b>Enhanced Flexibility with Plugins and Traits:</b><br>
            RAX/language feature of the framework facilitates the use of plugins (functions & modifiers) and traits, allowing developers to broaden their application capabilities and adapt their code to more eclectic requirements.<br>
        </p>
    </li>
    <li>
        <p>
            <b>JSON Scripting:</b><br>
            An intriguing feature of this framework is its ability to script in JSON. This not only makes development more flexible but also makes it compatible with various data exchange formats, making RAX/Framework a more versatile tool for modern web development.<br>
        </p>
    </li>
    <li>
        <p>
            <b>User-friendly:</b><br>
            Despite being powerful, RAX/Framework doesn&quote;t compromise on the ease of use, making it well-suited for both beginners venturing into web application development and seasoned developers seeking powerful tools.<br>
        </p>
    </li>
    </ol>
    <p>
        All in all, raxon/framework fuses power with ease and flexibility, offering an optimal toolset that caters well to contemporary web application development needs. <br>
        Have a look at <a href="/Debug" title="Debug">debug</a> output to see what&quote;s going on under the hood.
    </p>
    <h3>License</h3>
    <pre>
{{if(file.exist(config('framework.dir.root') + 'LICENSE'))}}
{{file.read(config('framework.dir.root') + 'LICENSE')}}
{{else}}
<span class="error">License not found...</span>
{{/if}}
    </pre>
    <h3>Support</h3>
    <p>
        If you want support, you can get it! <br>
        Contact <a href="mailto:info@workandtravel.world">info@workandtravel.world</a>.
    </p>
</section>