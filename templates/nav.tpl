<nav class="menu">
    <ul class="navigation">
    {if ($SESSION == '')}
        <li><a href="equipos" class="transform">equipos</a></li>  
        <li><a href="divisiones" class="transform">divisiones</a></li>  
        
    {/if}
    {if ($SESSION != '')}
        <li><a href="equipos" class="transform">home</a></li>
        <li><a href="adminEquipo" class="transform">equipos</a></li>
        <li><a href="adminDivisiones" class="transform">divisiones</a></li>
        <li><a href="usersList" class="transform">users</a></li>      
    {/if}
    </ul>
</nav>