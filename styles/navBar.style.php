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
    text-decoration: none;
    justify-content: center;
    align-items: center;
    font-weight: 500;
    font-size: .8em;
    padding-top: 5px;
    width: 125px;
    border-bottom: 5px solid var(--secondary);
    color: white;
}

.header_nav>li>a>i {
    margin-left: 3px;
}

.header_nav>li a:hover,
.focus {
    color: var(--fontDark);
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

.elements,
.userDrop {
    position: absolute;
    background-color: var(--shadow);
    z-index: 9;
    display: none;
    flex-direction: column;
    border-radius: 4px;
    top: 42px;
    overflow: hidden;
    padding: 0;
}

.userDrop>a {
    padding: 8px 30px;
    text-decoration: none;
    font-weight: 700;
    color: var(--primary);
    font-size: .65em;
    transition: .3s ease-in-out;
}

.userDrop>a>i {
    font-size: .9em;
    margin-right: 5px;
    margin-left: -5px;
}

.userDrop>a:hover {
    background-color: var(--fontDark);
    transition: .3s ease-in-out;
    color: var(--secondary);
}

.elShow,
.show {
    display: flex;
}


.elements {
    top: 35px;
}

.elements>li {
    display: flex;
}

.elements>li>a {
    padding: 6px 25px;
    text-decoration: none;
    width: 100%;
    color: var(--primary);
    font-size: .65em;
}

.elements>li>a>i {
    font-size: .95em;
    margin-right: 5px;
}

.elements>li>a:hover {
    background-color: var(--fontDark);
    color: var(--secondary) !important;
}
</style>