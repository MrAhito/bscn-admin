<style>
.add_sub_block {
    position: absolute;
    background-color: rgba(194, 194, 194, .3);
    top: 50px;
    left: 0;
    right: 0;
    bottom: 0;
    display: none;
    justify-content: center;
    align-items: center;
}

.add_sub {
    width: 75%;
    overflow: hidden;
    border-radius: 5px;
    background-color: var(--primary);
}

.add_head {
    margin: 0;
    background-color: var(--tertiary);
    font-size: 0.65em;
    padding: 0 15px;
    border-bottom: 2px solid var(--secondary);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.add_head>h2 {
    color: var(--primary);
    font-size: 1.1em;

}

.add_head>h2>i {
    font-size: 1.2em;
    margin-right: 5px;
}

.add_head>i {
    color: var(--primary);
    font-size: 1.65em;
    margin-right: 5px;
}

.add_head>i:hover {
    color: red;
}

.hidAdd {
    display: flex;
}

.form_add {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    padding: 20px;
    padding-bottom: 50px;
    row-gap: 20px;
    column-gap: 50px;
}

.gr1 {
    grid-column: 1/13;
}

.gr2-1 {
    grid-column: 1/5;
}

.gr2-2 {
    grid-column: 5/9;
}

.gr2-3 {
    grid-column: 9/13;
}

.gr3-1 {
    grid-column: 1/7;
}

.gr3-2 {
    grid-column: 7/13;
}

.gr4-1 {
    grid-column: 1/3;
}

.gr4-2 {
    grid-column: 3/5;
}

.gr4-3 {
    grid-column: 5/7;
}

.gr4-4 {
    grid-column: 7/9;
}

.gr4-5 {
    grid-column: 9/11;
}

.gr4-6 {
    grid-column: 11/13;
}

.gr5-1 {
    grid-column: 1/4;
}

.gr5-2 {
    grid-column: 4/7;
}

.gr5-3 {
    grid-column: 7/10;
}

.gr5-4 {
    grid-column: 10/13;
}


.header1 {
    display: flex;
    justify-content: space-between;
    font-weight: 600;
    border-radius: 4px;
    overflow: hidden;
    font-size: .8em;
    border-bottom: 1px solid var(--secondary);
}

.header1>h2 {
    margin: 0;
    width: 150px;
    padding: 8px;
    display: flex;
    align-items: center;
    font-size: .85em;
    color: var(--primary);
    background: linear-gradient(to left top, var(--secondary), var(--tertiary2));
}

.email {
    text-transform: lowercase !important;
}

.email::placeholder {
    text-transform: uppercase !important;
}

.bt_5 {
    margin-top: 20px;
}

.form_add>form-control {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.form_add>form-control>label>pre {
    font-size: 0.8em;
    margin: 0;
    padding: 0 !important;
    font-weight: 600;
}

.form_add>form-control>input,
.form_add>form-control>select {
    width: 75%;
    background-color: var(--fontDark);
    filter: brightness(1.25);
    font-size: 0.75em;
    border-radius: 5px;
    border: none;
    text-transform: uppercase;
    padding: 8px;
    border-bottom: 1px solid var(--fontDark2);
    outline: none;
}

.form_add>form-control>select {
    width: 80%;
}

.form_add>form-control>input:not(:placeholder-shown) {
    border-color: var(--secondary);
    box-shadow: 1px 1px 5px var(--secondary);
}

.form_add>form-control>select:valid {
    box-shadow: 1px 1px 5px var(--secondary);
    border-color: var(--secondary);
}

.form_add>form-control>select>option {
    font-size: 1.1em;
    color: var(--primary);
    background-color: var(--fontDark);
}

.form_add>form-control>input:hover,
.form_add>form-control>input:focus,
.form_add>form-control>select:hover,
.form_add>form-control>select:focus {
    box-shadow: 1px 1px 5px var(--secondary);
    border-bottom: 1px solid var(--secondary);
}

.opt_brgy {
    display: none !important;
}

.bal,
.pil,
.ori {
    display: flex;
}

.form-c-btn {
    display: flex;
    align-items: center;
    justify-content: end;
}

.addFormBtn {
    display: flex;
    align-items: center;
    font-size: .85em;
    border-radius: 4px;
    padding: 0 10px;
    font-weight: 600;
}

.addFormBtn>i {
    font-size: 1.2em;
    margin-right: 5px;
}
</style>