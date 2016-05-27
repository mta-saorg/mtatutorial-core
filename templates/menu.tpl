
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        MTA Scripting Tutorial
                    </a>
                </li>

                {foreach from=$files item=file}
                    <li>
                        <a href="/?page={$file}">{$file}</a>
                    </li>
                    
                {/foreach}

                
            </ul>
        </div>
