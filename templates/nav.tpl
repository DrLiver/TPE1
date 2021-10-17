<nav class="menu">
    <ul class="navigation">
    {if ($SESSION == '')}
        <li><a href="home" class="transform">home</a></li>  
    {/if}
    {if ($SESSION != '')}
        <li><a href="home" class="transform">home</a></li>
        <li><a href="admin" class="transform">admin</a></li>
        <li><a href="usersList" class="transform">users</a></li>      
    {/if}
    </ul>
</nav>