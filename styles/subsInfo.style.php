<style>
.p_info {
    display: flex;
    align-items: center;
    flex-direction: row;
    height: fit-content;
    flex-wrap: wrap;
    width: 100%;
}

.inf_ {
    display: flex;
    flex-wrap: wrap;
    position: absolute;
    top: 80px;
    bottom: 0;
    left: 0;
    right: 0;
    justify-content: space-around;
    align-content: flex-start;
}

.inf_head>a {
    cursor: pointer;
    color: var(--primary);
    text-decoration: none;
    padding: 10px;
    display: flex;
    align-items: center;
    font-size: 1.175em;
}

.inf_head>a>i {
    margin-right: 5px;
}

.inf_head>a:hover {
    color: var(--fontDark);
    transition: .3s all ease-in-out;
}

.form_section {
    display: flex;
    width: 48%;
    height: 35%;
    flex-direction: column;
}

.full_sect {
    display: flex;
    overflow: hidden;
    height: 25%;
    width: 99.5%;
    flex-direction: column;
}

.header1 {
    height: 40px;
    border-radius: 5px 5px 0 0;
}

.header1>h2 {
    width: 100%;

}

.forms_ {
    border: 1px solid var(--shadow);
    display: flex;
    height: 100%;
    flex-wrap: wrap;
    justify-content: center;
    align-content: flex-start;
    flex-direction: row;
}

.form_section>.forms_>.group {
    display: flex;
    flex-direction: column;
    width: 31%;
    margin: 1%;
}

.full_sect>.forms_>.group {
    display: flex;
    flex-direction: column;
    width: 11%;
    margin: 10px;
}

.group>label>pre {
    padding: 5px;
    font-size: .8em;
    font-weight: 500;
    margin: 0;
}

.group>select:valid,
.group>input,
.group>select,
.group>input:not(:placeholder-shown) {
    background-color: var(--fontDark);
    filter: brightness(1.25);
    font-size: .9em;
    border-radius: 5px;
    border: none;
    text-transform: uppercase;
    padding: 10px;
    pointer-events: none;
    border-bottom: 1px solid var(--fontDark2);
    outline: none;
}

.editInput {
    pointer-events: visible !important;
    box-shadow: 1px 1px 5px var(--secondary) !important;
}

.gr1 {
    width: 100%;
}

.divEdit {
    display: none;
    margin: 0;
    position: absolute;
    overflow: hidden;
    justify-content: space-between;
    border-radius: 4px;
    right: 10px;
    top: -25px;
    width: 190px;
}

.sinBtn {
    justify-content: flex-end;
}

.douBtn {
    justify-content: space-between;
}

.showInfBtn {
    display: flex;
}

.subsInfBtn {
    font-size: .9em;
    padding: 3px;
    width: 85px;
}

.subsInfBtn>i {
    font-size: .9em;
    margin-right: 5px;
}

.canc {
    border-color: var(--red);
    background-color: var(--red);
    color: var(--primary);
    transition: .3s all ease-in-out
}

.canc:hover {
    background-color: var(--primary);
    color: var(--secondary);
    transition: .3s all ease-in-out;
    ;
}
</style>