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
    grid-template-columns: repeat(22, 1fr);
    row-gap: 15px;

}

.inf_head>a {
    cursor: pointer;
    color: var(--primary);
    text-decoration: none;
    padding: 7px;
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

.form_add>form-control>select:valid,
.form_add>form-control>input,
.form_add>form-control>select,
.form_add>form-control>input:not(:placeholder-shown) {
    border-bottom: 1px solid var(--fontDark2);
    box-shadow: none;
    pointer-events: none;
}

.editInput {
    pointer-events: visible !important;
    box-shadow: 1px 1px 5px var(--secondary) !important;
}

.gr1 {
    grid-column: 1/23;
}

.gr6-1 {
    grid-column: 2/6;
}

.gr6-2 {
    grid-column: 6/10;
}

.gr6-3 {
    grid-column: 10/14;
}

.gr6-4 {
    grid-column: 14/18;
}

.gr6-5 {
    grid-column: 18/22;
}

.gr7-1 {
    grid-column: 2/8;
}

.gr7-2 {
    grid-column: 8/14;
}

.gr7-3 {
    grid-column: 14/20;
}

.gr8-1 {
    grid-column: 2/7;
}

.gr8-2 {
    grid-column: 7/12;
}

.gr8-3 {
    grid-column: 12/17;
}

.gr8-4 {
    grid-column: 17/22;
}

.bt_5 {
    margin-top: 10px;
}

.divEdit {
    display: none;
    margin: 0;
    overflow: hidden;
    justify-content: space-between;
    border-radius: 4px;
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
    transition: .3s all ease-in-out;;
}
</style>