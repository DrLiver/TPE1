<nav id="nav">
    <ul>
    {if ($SESSION eq '')}
        <li><a href="home">home</a></li>  
    {/if}
    {if ($SESSION neq '')}
        <li><a href="home">home</a></li>
        <li><a href="admin">admin</a></li>
        <li><a href="usersList">users</a></li>      
    {/if}
    </ul>
</nav>