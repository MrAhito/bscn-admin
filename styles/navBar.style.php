<style type="text/css">
.section_dash {
    width: 100%;
}

.nav_bar {
    height: 50px;
    top: 0;
    background-color: var(--secondary);
    display: flex;
    justify-content: space-between;
    box-shadow: 0px 2px 5px var(--shadow);
}

.ic_nav,
.user_nav {
    width: 15%;
    display: flex;
    align-items: center;
    padding: 10px;
}

.ic_img {
    margin-right: 8px;
    width: 30px;
    height: 30px;
}

.ic_txt {
    color: var(--primary);
    font-weight: 500;
    font-size: .85em;
    list-style-type: none;
}

.header_nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    display: flex;
    flex-direction: row;
}

.header_nav>li {
    display: flex;
    cursor: pointer;
}

.header_nav>li>a {
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 500;
    padding-top: 5px;
    width: 125px;
    border-bottom: 5px solid var(--secondary);
    color: white;
}

.header_nav>li a:hover,
.focus {
    border-bottom: 5px solid var(--fontDark) !important;
}

.user_nav {
    justify-content: flex-end;
    cursor: pointer;
}

.user_name {
    font-size: .75em;
    color: var(--primary);
    font-weight: 400;
    margin-right: 10px;
}

.userIC {
    cursor: pointer;
    color: var(--primary);
    padding: 8px;
    font-size: .75rem;
    border-radius: 50%;
    border: 1px solid var(--primary);
}
</style>