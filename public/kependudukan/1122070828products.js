import AddCircleOutlineIcon from "@mui/icons-material/AddCircleOutline";
import RemoveCircleOutlineIcon from "@mui/icons-material/RemoveCircleOutline";
import PropTypes from "prop-types";
import * as React from "react";
import {
  Create,
  Datagrid,
  DatagridConfigurable,
  DateInput,
  Edit,
  ImageField,
  ImageInput,
  List,
  NumberField,
  NumberInput,
  ReferenceField,
  ReferenceInput,
  SelectInput,
  Show,
  ShowButton,
  SimpleForm,
  SimpleList,
  SimpleShowLayout,
  TextField,
  TextInput,
  useCreate,
  useDataProvider,
  useGetRecordId,
  useNotify,
  useRecordContext,
  useUpdate,
} from "react-admin";
import VisibilityIcon from "@mui/icons-material/Visibility";
import EditIcon from "@mui/icons-material/Edit";
import { Box, Button, IconButton, useMediaQuery } from "@mui/material";
import { v4 as uuid } from "uuid";
import AlertDialog from "../components/AlertDialog";
import BackButton from "../components/BackButton";
import BuyButton from "../components/BuyButton";
import BuyDialog from "../components/BuyDialog";
import SelectColumnButton from "../components/SelectColumnButton";
import SelectColumnButtonEmploye from "../components/SelectColumnButtonEmploye";
import GridProductCard from "../components/resources/products/GridProductCard";
import { DialogContext, OrganEmployeContext } from "../context";
import useCloseAccordion from "../hooks/useCloseAccordion";

const productFilters = [
  <TextInput source="q" label="Search" alwaysOn />,
  <ReferenceInput
    source="idOrganizationProfiles"
    label="OrganizationProfiles"
    reference="organizationProfiles"
  />,
];

const haveSameData = (obj1, obj2) => {
  const obj1Length = Object.keys(obj1).length;
  const obj2Length = Object.keys(obj2).length;

  if (obj1Length === obj2Length) {
    return Object.keys(obj1).every(
      (key) => Object.prototype.hasOwnProperty.call(obj2, key) && obj2[key] === obj1[key]
    );
  }
  return false;
};

// Customer

export const ProductCustomerList = () => {
  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsCustomerList Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsCustomerList MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsCustomerList UNMOUNTED");
  }, []);

  return (
    <List
      resource="productsOrServices"
      title="resources.products.title_customer"
      filters={productFilters}
      hasCreate={false}
      pagination={false}
    >
      <GridProductCard />
    </List>
  );
};

// Owner

const ProductOwnerAccordion = () => {
  const [isEdit, setIsEdit] = React.useState(false);

  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerAccordion Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerAccordion MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerAccordion UNMOUNTED");
  }, []);

  return (
    <Box>
      {!isEdit && <ProductOwnerShow />}
      {!isEdit && (
        <IconButton sx={{ marginTop: "8px", color: "#1F75CB" }} onClick={() => setIsEdit(true)}>
          <EditIcon />
        </IconButton>
      )}

      {isEdit && <ProductOwnerEdit />}
      {isEdit && (
        <IconButton sx={{ marginTop: "8px", color: "#1F75CB" }} onClick={() => setIsEdit(false)}>
          <VisibilityIcon />
        </IconButton>
      )}
    </Box>
  );
};

export const ProductOwnerList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.up("sm"));
  const isMedium = useMediaQuery((theme) => theme.breakpoints.up("md"));
  const isLarge = useMediaQuery((theme) => theme.breakpoints.up("lg"));
  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsOwnerList Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsOwnerList MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsOwnerList UNMOUNTED");
  }, []);

  return (
    <List
      title="resources.products.title"
      filter={{
        idOrganizationProfiles: localStorage.getItem("idOrganization"),
      }}
      filters={productFilters}
      hasCreate
    >
      <SelectColumnButton group="owner" source="productsOrServices" preferenceKey="" />
      <DatagridConfigurable rowClick="expand" expand={<ProductOwnerAccordion />} expandSingle>
        <TextField source="nameProduct" label="resources.products.fields.nameProduct" />
        {isSmall && <TextField source="category" label="resources.products.fields.category" />}
        {isMedium && (
          <NumberField source="purchasePrice" label="resources.products.fields.purchasePrice" />
        )}
        {isMedium && (
          <ReferenceField
            source="idSupplier"
            reference="supplier"
            label="resources.products.fields.idSupplier"
            link={false}
          />
        )}
        {isLarge && (
          <NumberField source="amountAvailable" label="resources.products.fields.amountAvailable" />
        )}
        {isLarge && <NumberField source="ordered" label="resources.products.fields.ordered" />}
      </DatagridConfigurable>
    </List>
  );
};

export const ProductOwnerShow = () => {
  const record = useRecordContext();

  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerShow Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerShow MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerShow UNMOUNTED");
  }, []);

  const getLowerCaseOnFirstCharacter = (text) => {
    const characterArray = text.split("");
    characterArray[0] = characterArray[0].toLowerCase();
    return characterArray.join("");
  };

  return (
    <Show
      id={record.id}
      actions={false}
      sx={{ borderRadius: "4px", boxShadow: "0px 3px 5px rgb(200,200,200)" }}
      title=" "
    >
      <SimpleShowLayout>
        {Object.entries(record).map((attributes) =>
          attributes[0] !== "id" ? (
            attributes[0].startsWith("id") ? (
              <ReferenceField
                source={attributes[0]}
                reference={getLowerCaseOnFirstCharacter(attributes[0].slice(2))}
                label={`resources.products.fields.${attributes[0]}`}
                link={false}
              />
            ) : typeof attributes[1] !== "string" ? (
              <TextField
                source={attributes[0]}
                label={`resources.products.fields.${attributes[0]}`}
              />
            ) : typeof attributes[1] !== "number" ? (
              <NumberField
                source={attributes[0]}
                label={`resources.products.fields.${attributes[0]}`}
              />
            ) : (
              ""
            )
          ) : (
            ""
          )
        )}
      </SimpleShowLayout>
    </Show>
  );
};

export const ProductOwnerEdit = () => {
  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerEdit Called");
  const dataProvider = useDataProvider();
  const record = useRecordContext();
  const notify = useNotify();
  const closeAccordion = useCloseAccordion();
  const hiddenStyle = {
    width: 200,
    visibility: "hidden",
    display: "none",
  };
  const visibleStyle = {
    width: 200,
    visibility: "visible",
    display: "block",
  };
  const [alertTitle, setAlertTitle] = React.useState("");
  const [alertDesc, setAlertDesc] = React.useState("");
  const [style2, setStyle2] = React.useState(hiddenStyle);
  const [style3, setStyle3] = React.useState(hiddenStyle);
  const [style4, setStyle4] = React.useState(hiddenStyle);
  const [removeImageButtonStyle, setRemoveImageButtonStyle] = React.useState({
    color: "red",
    visibility: "hidden",
  });
  const [addImageButtonStyle, setAddImageButtonStyle] = React.useState({
    color: "blue",
    visibility: "visible",
  });

  const recordId = useGetRecordId();
  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerEdit MOUNTED");

    dataProvider
      .getOne("productsOrServices", {
        id: recordId,
      })
      .then(async (res) => {
        if (res.data.picture.second.src !== "") {
          setRemoveImageButtonStyle({
            color: "red",
            visibility: "visible",
          });
          setStyle2(visibleStyle);
        }
        if (res.data.picture.third.src !== "") setStyle3(visibleStyle);
        if (res.data.picture.fourth.src !== "") setStyle4(visibleStyle);
      });

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerEdit UNMOUNTED");
  }, []);

  const current = new Date();
  const date = `${current.getFullYear()}-${current.getMonth() + 1}-${current.getDate()}`;
  const [update] = useUpdate();
  const backendUrl = "https://express-s3.vercel.app";

  const onSuccess = async (data) => {
    const arrayImageFile = [];
    const imageTitle = [];
    const arrayImageInput = [
      data.picture.first,
      data.picture.second,
      data.picture.third,
      data.picture.fourth,
    ];

    if (arrayImageInput[0] === null || arrayImageInput[0].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.first.rawFile);
      if (data.picture.first.image_title) imageTitle.push(data.picture.first.image_title);
      else imageTitle.push("First Image");
    }

    if (arrayImageInput[1] === null || arrayImageInput[1].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.second.rawFile);
      if (data.picture.second.image_title) imageTitle.push(data.picture.second.image_title);
      else imageTitle.push("Second Image");
    }

    if (arrayImageInput[2] === null || arrayImageInput[2].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.third.rawFile);
      if (data.picture.third.image_title) imageTitle.push(data.picture.third.image_title);
      else imageTitle.push("Third Image");
    }

    if (arrayImageInput[3] === null || arrayImageInput[3].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.fourth.rawFile);
      if (data.picture.fourth.image_title) imageTitle.push(data.picture.fourth.image_title);
      else imageTitle.push("Fourth Image");
    }

    const imageUrlUpdate = [];

    dataProvider
      .getOne("productsOrServices", {
        id: data.id,
      })
      .then(async (res) => {
        const arrayImageUrl = [
          res.data.picture.first.src,
          res.data.picture.second.src,
          res.data.picture.third.src,
          res.data.picture.fourth.src,
        ];

        for (let i = 0; i < arrayImageUrl.length; i++) {
          const oldImageSrc = [];
          oldImageSrc.push(arrayImageUrl[i]);
          if (arrayImageInput[i] !== "") {
            if (arrayImageFile[i]) {
              console.log("AWS Image Upload Called");
              const { url } = await fetch(
                `${backendUrl}/s3Url?folder=organization_${localStorage.getItem(
                  "idOrganization"
                )}/products/${data.id}`
              ).then((resArrayImage) => resArrayImage.json());

              if (oldImageSrc[0] !== "") {
                const image = oldImageSrc[0].split(
                  "https://umkm-direct-upload-to-s3.s3.ap-southeast-3.amazonaws.com/"
                );
                await fetch(`${backendUrl}/s3DeleteUrl?image=${image[1]}`)
                  .then((resOldImage) => {
                    console.log(resOldImage);
                  })
                  .catch((errorOldImage) => {
                    console.log(errorOldImage);
                  });
              }

              await fetch(url, {
                method: "PUT",
                headers: {
                  "Content-Type": "multipart/form-data",
                },
                body: arrayImageFile[i],
              });

              const imageUrl = url.split("?")[0];
              imageUrlUpdate.push(imageUrl);
            } else imageUrlUpdate.push(arrayImageUrl[i]);
          } else {
            if (oldImageSrc[0] !== "") {
              const image = oldImageSrc[0].split(
                "https://umkm-direct-upload-to-s3.s3.ap-southeast-3.amazonaws.com/"
              );
              await fetch(`${backendUrl}/s3DeleteUrl?image=${image[1]}`)
                .then((resNullOldImage) => {
                  console.log(resNullOldImage);
                })
                .catch((errorNullOldImage) => {
                  console.log(errorNullOldImage);
                });
            }

            imageUrlUpdate.push("");
          }
        }

        update("productsOrServices", {
          id: data.id,
          data: {
            idOrganizationProfiles: data.idOrganizationProfiles,
            nameProduct: data.nameProduct,
            description: data.description,
            category: data.category,
            purchasePrice: data.purchasePrice,
            idSupplier: data.idSupplier,
            amountAvailable: data.amountAvailable,
            ordered: data.ordered,
            createdAt: data.createdAt,
            createdBy: data.createdBy,
            updatedAt: date,
            updatedBy: localStorage.getItem("id"),
            picture: {
              first: {
                src: imageUrlUpdate[0],
                image_title: imageTitle[0],
              },
              second: {
                src: imageUrlUpdate[1],
                image_title: imageTitle[1],
              },
              third: {
                src: imageUrlUpdate[2],
                image_title: imageTitle[2],
              },
              fourth: {
                src: imageUrlUpdate[3],
                image_title: imageTitle[3],
              },
            },
          },
          previousData: data,
        });
      });

    notify("ra.notification.updated", {
      messageArgs: { smart_count: 1 },
      undoable: true,
    });

    closeAccordion(data.id);
  };

  const dialogCtx = React.useContext(DialogContext);

  const HandleAddImage = () => {
    if (haveSameData(style2, hiddenStyle)) {
      const e = document.getElementById("image_field1");
      if (e.firstChild)
        if (!e.firstChild.attributes.src) {
          dialogCtx.setAlert((prev) => !prev);
          setAlertTitle("Oops");
          setAlertDesc("Can't add new image! You must add previous images!");
        } else {
          setStyle2(visibleStyle);
          setRemoveImageButtonStyle({
            color: "red",
            visibility: "visible",
          });
        }
      else {
        dialogCtx.setAlert((prev) => !prev);
        setAlertTitle("Oops");
        setAlertDesc("Can't add new image! You must add previous images!");
      }
    } else if (haveSameData(style3, hiddenStyle)) {
      const e = document.getElementById("image_field2");
      if (e.firstChild)
        if (!e.firstChild.attributes.src) {
          dialogCtx.setAlert((prev) => !prev);
          setAlertTitle("Oops");
          setAlertDesc("Can't add new image! You must add previous images!");
        } else setStyle3(visibleStyle);
      else {
        dialogCtx.setAlert((prev) => !prev);
        setAlertTitle("Oops");
        setAlertDesc("Can't add new image! You must add previous images!");
      }
    } else if (haveSameData(style4, hiddenStyle)) {
      const e = document.getElementById("image_field3");
      if (e.firstChild)
        if (!e.firstChild.attributes.src) {
          dialogCtx.setAlert((prev) => !prev);
          setAlertTitle("Oops");
          setAlertDesc("Can't add new image! You must add previous images!");
        } else {
          setStyle4(visibleStyle);
          setAddImageButtonStyle({
            color: "blue",
            visibility: "hidden",
          });
        }
      else {
        dialogCtx.setAlert((prev) => !prev);
        setAlertTitle("Oops");
        setAlertDesc("Can't add new image! You must add previous images!");
      }
    } else {
      dialogCtx.setAlert((prev) => !prev);
      setAlertTitle("Oops");
      setAlertDesc("You just can add four images!");
    }
  };

  const HandleRemoveImage = () => {
    if (haveSameData(style4, visibleStyle)) {
      setStyle4(hiddenStyle);
      const e = document.getElementById("image_field4");
      if (e.firstChild) {
        e.firstChild.removeAttribute("src");
        e.firstChild.removeAttribute("alt");
        e.firstChild.removeAttribute("title");
        document.getElementsByClassName("previews")[3].style.visibility = "hidden";
        document.getElementsByClassName("previews")[3].style.display = "none";
      }
      setAddImageButtonStyle({
        color: "blue",
        visibility: "visible",
      });
    } else if (haveSameData(style3, visibleStyle)) {
      setStyle3(hiddenStyle);
      const e = document.getElementById("image_field3");
      if (e.firstChild) {
        e.firstChild.removeAttribute("src");
        e.firstChild.removeAttribute("alt");
        e.firstChild.removeAttribute("title");
        document.getElementsByClassName("previews")[2].style.visibility = "hidden";
        document.getElementsByClassName("previews")[2].style.display = "none";
      }
    } else if (haveSameData(style2, visibleStyle)) {
      setRemoveImageButtonStyle({
        color: "red",
        visibility: "hidden",
      });
      setStyle2(hiddenStyle);
      const e = document.getElementById("image_field2");
      if (e.firstChild) {
        e.firstChild.removeAttribute("src");
        e.firstChild.removeAttribute("alt");
        e.firstChild.removeAttribute("title");
        document.getElementsByClassName("previews")[1].style.visibility = "hidden";
        document.getElementsByClassName("previews")[1].style.display = "none";
      }
    }
  };

  const onChangeImage = (image) => {
    document.getElementsByClassName("previews")[image].style.visibility = "visible";
    document.getElementsByClassName("previews")[image].style.display = "block";
  };

  return (
    <>
      <Edit
        mutationOptions={{ onSuccess }}
        id={record.id}
        actions={false}
        sx={{ borderRadius: "4px", boxShadow: "0px 3px 5px rgb(200,200,200)" }}
        title=" "
      >
        <SimpleForm>
          <TextInput source="nameProduct" label="resources.products.fields.nameProduct" fullWidth />
          <SelectInput
            label="resources.products.fields.category"
            source="category"
            choices={[
              {
                id: "Produk",
                name: "Produk",
              },
              {
                id: "Jasa",
                name: "Jasa",
              },
            ]}
            fullWidth
          />
          <NumberInput
            source="purchasePrice"
            label="resources.products.fields.purchasePrice"
            fullWidth
          />
          <NumberInput
            source="amountAvailable"
            label="resources.products.fields.amountAvailable"
            fullWidth
          />
          <ReferenceInput
            source="idSupplier"
            reference="supplier"
            filter={{
              idOrganizationProfiles: localStorage.getItem("idOrganization"),
            }}
          >
            <SelectInput
              label="resources.products.fields.idSupplier"
              optionText="organizationName"
              fullWidth
            />
          </ReferenceInput>
          <TextInput
            source="description"
            label="resources.products.fields.description"
            maxRows={15}
            multiline
            fullWidth
          />
          <ImageInput
            source="picture.first"
            sx={{
              width: 200,
            }}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field1" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.first.image_title"
            label="resources.products.fields.picture"
            sx={{ marginTop: 0 }}
          />
          <ImageInput
            source="picture.second"
            onChange={() => onChangeImage(1)}
            sx={style2}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field2" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.second.image_title"
            label="resources.products.fields.picture"
            sx={style2}
            fullWidth
          />
          <ImageInput
            source="picture.third"
            onChange={() => onChangeImage(2)}
            sx={style3}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field3" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.third.image_title"
            label="resources.products.fields.picture"
            sx={style3}
            fullWidth
          />
          <ImageInput
            source="picture.fourth"
            onChange={() => onChangeImage(3)}
            sx={style4}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field4" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.fourth.image_title"
            label="resources.products.fields.picture"
            sx={style4}
            fullWidth
          />

          {/* <AddImageButton /> */}
          <Button onClick={HandleAddImage} sx={addImageButtonStyle}>
            <AddCircleOutlineIcon />
            Add Image
          </Button>
          {/* <RemoveImageButton /> */}
          <Button onClick={HandleRemoveImage} sx={removeImageButtonStyle}>
            <RemoveCircleOutlineIcon />
            Remove
          </Button>
        </SimpleForm>
      </Edit>
      <AlertDialog title={alertTitle} desc={alertDesc} />
    </>
  );
};

export const ProductOwnerCreate = () => {
  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerCreate Called");

  const [newId, setNewId] = React.useState(null);
  const notify = useNotify();

  React.useEffect(() => {
    const uniqueId = uuid();
    setNewId(uniqueId);

    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerCreate MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerCreate UNMOUNTED");
  }, []);

  const current = new Date();
  const date = `${current.getFullYear()}-${current.getMonth() + 1}-${current.getDate()}`;
  const [create] = useCreate();
  const backendUrl = "https://express-s3.vercel.app";

  const HandleSubmit = async (data) => {
    console.log(data);
    const arrayImageInput = [
      data.picture.first,
      data.picture.second,
      data.picture.third,
      data.picture.fourth,
    ];
    const arrayImageFile = [];
    const imageTitle = [];

    if (arrayImageInput[0].rawFile === null || arrayImageInput[0].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.first.rawFile);
      if (data.picture.first.image_title) imageTitle.push(data.picture.first.image_title);
      else imageTitle.push("First Image");
    }

    if (arrayImageInput[1].rawFile === null || arrayImageInput[1].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.second.rawFile);
      if (data.picture.second.image_title) imageTitle.push(data.picture.second.image_title);
      else imageTitle.push("Second Image");
    }

    if (arrayImageInput[2].rawFile === null || arrayImageInput[2].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.third.rawFile);
      if (data.picture.third.image_title) imageTitle.push(data.picture.third.image_title);
      else imageTitle.push("Third Image");
    }

    if (arrayImageInput[3].rawFile === null || arrayImageInput[3].rawFile === undefined) {
      arrayImageFile.push("");
      imageTitle.push("");
    } else {
      arrayImageFile.push(data.picture.fourth.rawFile);
      if (data.picture.fourth.image_title) imageTitle.push(data.picture.fourth.image_title);
      else imageTitle.push("Fourth Image");
    }

    const imageUrlPromises = [];

    for (let i = 0; i < arrayImageInput.length; i++) {
      if (arrayImageFile[i] === "") {
        imageUrlPromises.push(Promise.resolve(""));
      } else {
        console.log("AWS Image Upload Called");
        const promise = fetch(
          `${backendUrl}/s3Url?folder=organization_${localStorage.getItem(
            "idOrganization"
          )}/products/${newId}`
        )
          .then((res) => res.json())
          .then(({ url }) => {
            return fetch(url, {
              method: "PUT",
              headers: {
                "Content-Type": "multipart/form-data",
              },
              body: arrayImageFile[i],
            }).then(() => {
              return url.split("?")[0];
            });
          });

        imageUrlPromises.push(promise);
      }
    }

    const imageUrl = await Promise.all(imageUrlPromises);

    const product = {
      id: newId,
      nameProduct: data.nameProduct,
      description: data.description,
      category: data.category,
      purchasePrice: data.purchasePrice,
      idSupplier: data.idSupplier,
      amountAvailable: data.amountAvailable,
      ordered: 0,
      createdAt: date,
      createdBy: localStorage.getItem("id"),
      updatedAt: date,
      updatedBy: localStorage.getItem("id"),
      idOrganizationProfiles: localStorage.getItem("idOrganization"),
      picture: {
        first: {
          src: imageUrl[0],
          image_title: imageTitle[0],
        },
        second: {
          src: imageUrl[1],
          image_title: imageTitle[1],
        },
        third: {
          src: imageUrl[2],
          image_title: imageTitle[2],
        },
        fourth: {
          src: imageUrl[3],
          image_title: imageTitle[3],
        },
      },
    };

    create("productsOrServices", {
      data: product,
    });

    notify("ra.notification.created", {
      messageArgs: { smart_count: 1 },
      undoable: true,
    });
  };

  const hiddenStyle = {
    width: 200,
    visibility: "hidden",
    display: "none",
  };
  const visibleStyle = {
    width: 200,
    visibility: "visible",
    display: "block",
  };
  const [alertTitle, setAlertTitle] = React.useState("");
  const [alertDesc, setAlertDesc] = React.useState("");
  const [style2, setStyle2] = React.useState(hiddenStyle);
  const [style3, setStyle3] = React.useState(hiddenStyle);
  const [style4, setStyle4] = React.useState(hiddenStyle);
  const [removeImageButtonStyle, setRemoveImageButtonStyle] = React.useState({
    color: "red",
    visibility: "hidden",
  });
  const [setAddImageButtonStyle] = React.useState({
    color: "blue",
    visibility: "visible",
  });
  const dialogCtx = React.useContext(DialogContext);

  const HandleAddImage = () => {
    if (haveSameData(style2, hiddenStyle)) {
      const e = document.getElementById("image_field1");
      if (e)
        if (!e.firstChild.attributes.src) {
          dialogCtx.setAlert((prev) => !prev);
          setAlertTitle("Oops");
          setAlertDesc("Can't add new image! You must add previous images!");
        } else {
          setStyle2(visibleStyle);
          setRemoveImageButtonStyle({
            color: "red",
            visibility: "visible",
          });
        }
      else {
        dialogCtx.setAlert((prev) => !prev);
        setAlertTitle("Oops");
        setAlertDesc("Can't add new image! You must add previous images!");
      }
    } else if (haveSameData(style3, hiddenStyle)) {
      const e = document.getElementById("image_field2");
      if (e)
        if (!e.firstChild.attributes.src) {
          dialogCtx.setAlert((prev) => !prev);
          setAlertTitle("Oops");
          setAlertDesc("Can't add new image! You must add previous images!");
        } else setStyle3(visibleStyle);
      else {
        dialogCtx.setAlert((prev) => !prev);
        setAlertTitle("Oops");
        setAlertDesc("Can't add new image! You must add previous images!");
      }
    } else if (haveSameData(style4, hiddenStyle)) {
      const e = document.getElementById("image_field3");
      if (e)
        if (!e.firstChild.attributes.src) {
          dialogCtx.setAlert((prev) => !prev);
          setAlertTitle("Oops");
          setAlertDesc("Can't add new image! You must add previous images!");
        } else {
          setStyle4(visibleStyle);
          setAddImageButtonStyle({
            color: "blue",
            visibility: "hidden",
          });
        }
      else {
        dialogCtx.setAlert((prev) => !prev);
        setAlertTitle("Oops");
        setAlertDesc("Can't add new image! You must add previous images!");
      }
    } else {
      dialogCtx.setAlert((prev) => !prev);
      setAlertTitle("Oops");
      setAlertDesc("You just can add four images!");
    }
  };

  const HandleRemoveImage = () => {
    if (haveSameData(style4, visibleStyle)) {
      setStyle4(hiddenStyle);
      const e = document.getElementById("image_field4");
      if (e) {
        e.firstChild.removeAttribute("src");
        e.firstChild.removeAttribute("alt");
        e.firstChild.removeAttribute("title");
        document.getElementsByClassName("previews")[3].style.visibility = "hidden";
        document.getElementsByClassName("previews")[3].style.display = "none";
      }
      setAddImageButtonStyle({
        color: "blue",
        visibility: "visible",
      });
    } else if (haveSameData(style3, visibleStyle)) {
      setStyle3(hiddenStyle);
      const e = document.getElementById("image_field3");
      if (e) {
        e.firstChild.removeAttribute("src");
        e.firstChild.removeAttribute("alt");
        e.firstChild.removeAttribute("title");
        document.getElementsByClassName("previews")[2].style.visibility = "hidden";
        document.getElementsByClassName("previews")[2].style.display = "none";
      }
    } else if (haveSameData(style2, visibleStyle)) {
      setRemoveImageButtonStyle({
        color: "red",
        visibility: "hidden",
      });
      setStyle2(hiddenStyle);
      const e = document.getElementById("image_field2");
      if (e) {
        e.firstChild.removeAttribute("src");
        e.firstChild.removeAttribute("alt");
        e.firstChild.removeAttribute("title");
        document.getElementsByClassName("previews")[1].style.visibility = "hidden";
        document.getElementsByClassName("previews")[1].style.display = "none";
      }
    }
  };

  const onChangeImage = (image) => {
    document.getElementsByClassName("previews")[image].style.visibility = "visible";
    document.getElementsByClassName("previews")[image].style.display = "block";
  };

  return (
    <>
      <BackButton />
      <Create redirect="list">
        <SimpleForm onSubmit={(event) => HandleSubmit(event)}>
          <TextInput
            source="id"
            disabled
            sx={{
              visibility: "hidden",
              display: "none",
            }}
            defaultValue={newId}
          />
          <TextInput source="nameProduct" label="resources.products.fields.nameProduct" fullWidth />
          <SelectInput
            label="resources.products.fields.category"
            source="category"
            choices={[
              {
                id: "Produk",
                name: "Produk",
              },
              {
                id: "Jasa",
                name: "Jasa",
              },
            ]}
            fullWidth
          />
          <NumberInput
            source="purchasePrice"
            label="resources.products.fields.purchasePrice"
            fullWidth
          />
          <NumberInput
            source="amountAvailable"
            label="resources.products.fields.amount"
            fullWidth
          />
          <ReferenceInput
            source="idSupplier"
            reference="supplier"
            filter={{
              idOrganizationProfiles: localStorage.getItem("idOrganization"),
            }}
          >
            <SelectInput
              label="resources.suppliers.fields.name"
              optionText="organizationName"
              fullWidth
            />
          </ReferenceInput>
          <TextInput
            source="description"
            label="resources.products.fields.description"
            maxRows={15}
            multiline
            fullWidth
          />
          <ImageInput
            source="picture.first"
            sx={{
              width: 200,
            }}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field1" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.first.image_title"
            label="Title, default: First Image"
            sx={{ marginTop: 0 }}
          />
          <ImageInput
            source="picture.second"
            onChange={() => onChangeImage(1)}
            sx={style2}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field2" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.second.image_title"
            label="resources.products.fields.picture"
            sx={style2}
            fullWidth
          />
          <ImageInput
            source="picture.third"
            onChange={() => onChangeImage(2)}
            sx={style3}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field3" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.third.image_title"
            label="Title, default: Third Image"
            sx={style3}
            fullWidth
          />
          <ImageInput
            source="picture.fourth"
            onChange={() => onChangeImage(3)}
            sx={style4}
            accept="image/*"
            maxSize={1000000}
          >
            <ImageField id="image_field4" source="src" title="image_title" />
          </ImageInput>
          <TextInput
            source="picture.fourth.image_title"
            label="Title, default: Fourth Image"
            sx={style4}
            fullWidth
          />

          <AddImageButton handleAddImage={HandleAddImage} />
          <Button onClick={HandleRemoveImage} sx={removeImageButtonStyle}>
            <RemoveCircleOutlineIcon />
            Remove
          </Button>
        </SimpleForm>
      </Create>
      <AlertDialog title={alertTitle} desc={alertDesc} />
    </>
  );
};

// Employee

const ProductEmployeeAccordion = () => {
  const [isEdit, setIsEdit] = React.useState(false);

  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerAccordion Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerAccordion MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductOwnerAccordion UNMOUNTED");
  }, []);

  return (
    <Box>
      {!isEdit && <ProductEmployeeShow />}
      {!isEdit && (
        <IconButton sx={{ marginTop: "8px", color: "#1F75CB" }} onClick={() => setIsEdit(true)}>
          <EditIcon />
        </IconButton>
      )}

      {isEdit && <ProductEmployeeEdit />}
      {isEdit && (
        <IconButton sx={{ marginTop: "8px", color: "#1F75CB" }} onClick={() => setIsEdit(false)}>
          <VisibilityIcon />
        </IconButton>
      )}
    </Box>
  );
};

export const ProductEmployeList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.up("sm"));
  const isMedium = useMediaQuery((theme) => theme.breakpoints.up("md"));
  const isLarge = useMediaQuery((theme) => theme.breakpoints.up("lg"));
  const { organEmploye } = React.useContext(OrganEmployeContext);

  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsEmployeList Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsEmployeList MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductsEmployeList UNMOUNTED");
  }, [organEmploye]);

  return (
    <List
      resource="productsOrServices"
      title="resources.products.title"
      filter={{
        idOrganizationProfiles: localStorage.getItem("idOrganizationEmploye"),
      }}
      filters={productFilters}
      hasCreate={false}
    >
      <SelectColumnButtonEmploye
        idOrganization={localStorage.getItem("idOrganizationEmploye")}
        source="productsOrServices"
        preferenceKey=""
      />
      <DatagridConfigurable
        bulkActionButtons={false}
        rowClick="expand"
        expand={<ProductEmployeeAccordion />}
        expandSingle
      >
        <TextField source="nameProduct" label="resources.products.fields.nameProduct" />
        {isSmall && <TextField source="category" label="resources.products.fields.category" />}
        {isMedium && (
          <NumberField source="purchasePrice" label="resources.products.fields.purchasePrice" />
        )}
        {isMedium && (
          <ReferenceField
            source="idSupplier"
            reference="supplier"
            label="resources.products.fields.idSupplier"
            link="show"
          />
        )}
        {isLarge && (
          <NumberField source="amountAvailable" label="resources.products.fields.amountAvailable" />
        )}
        {isLarge && <NumberField source="ordered" label="resources.products.fields.ordered" />}
      </DatagridConfigurable>
    </List>
  );
};

export const ProductEmployeeShow = () => {
  const record = useRecordContext();

  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductEmployeeShow Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductEmployeeShow MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductEmployeeShow UNMOUNTED");
  }, []);

  const getLowerCaseOnFirstCharacter = (text) => {
    const characterArray = text.split("");
    characterArray[0] = characterArray[0].toLowerCase();
    return characterArray.join("");
  };

  return (
    <Show id={record.id} actions={false}>
      <SimpleShowLayout>
        {Object.entries(record).map((attributes) =>
          attributes[0] !== "id" ? (
            attributes[0].startsWith("id") ? (
              <ReferenceField
                source={attributes[0]}
                reference={getLowerCaseOnFirstCharacter(attributes[0].slice(2))}
                label={`resources.products.fields.${attributes[0]}`}
                link={false}
              />
            ) : typeof attributes[1] !== "string" ? (
              <TextField
                source={attributes[0]}
                label={`resources.products.fields.${attributes[0]}`}
              />
            ) : typeof attributes[1] !== "number" ? (
              <NumberField
                source={attributes[0]}
                label={`resources.products.fields.${attributes[0]}`}
              />
            ) : (
              ""
            )
          ) : (
            ""
          )
        )}
      </SimpleShowLayout>
    </Show>
  );
};

export const ProductEmployeeEdit = () => {
  const record = useRecordContext();
  const notify = useNotify();
  const closeAccordion = useCloseAccordion();

  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductEmployeeEdit Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductEmployeeEdit MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductEmployeeEdit UNMOUNTED");
  }, []);

  const current = new Date();
  const date = `${current.getFullYear()}-${current.getMonth() + 1}-${current.getDate()}`;

  const onSuccess = () => {
    notify("ra.notification.updated", {
      messageArgs: { smart_count: 1 },
      undoable: true,
    });
    closeAccordion(record.id);
  };

  return (
    <Edit mutationOptions={{ onSuccess }} redirect="/productsOrServices-employe" id={record.id}>
      <SimpleForm>
        <TextInput source="nameProduct" label="resources.products.fields.nameProduct" />
        <TextInput source="description" label="resources.products.fields.description" />
        <SelectInput
          label="resources.products.fields.category"
          source="category"
          choices={[
            {
              id: "Produk",
              name: "Produk",
            },
            {
              id: "Jasa",
              name: "Jasa",
            },
          ]}
        />
        <NumberInput source="purchasePrice" label="resources.products.fields.purchasePrice" />
        <ReferenceInput
          source="idSupplier"
          reference="supplier"
          filter={{
            idOrganizationProfiles: localStorage.getItem("idOrganization"),
          }}
        >
          <SelectInput label="resources.products.fields.idSupplier" optionText="organizationName" />
        </ReferenceInput>
        <NumberInput source="amountAvailable" label="resources.products.fields.amountAvailable" />
        <NumberInput
          source="ordered"
          sx={{
            visibility: "hidden",
            display: "none",
          }}
          defaultValue={0}
        />
        <DateInput
          source="updatedAt"
          sx={{
            visibility: "hidden",
            display: "none",
          }}
          defaultValue={date}
        />
        <NumberInput
          source="updatedBy"
          sx={{
            visibility: "hidden",
            display: "none",
          }}
          defaultValue={parseInt(localStorage.getItem("id"))}
          disabled
        />
      </SimpleForm>
    </Edit>
  );
};

export const ProductLists = () => {
  process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductLists Called");

  React.useEffect(() => {
    process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductLists MOUNTED");

    return () =>
      process.env.REACT_APP_COMP_DEBUG === "yes" && console.log("ProductLists UNMOUNTED");
  }, []);

  const isSmall = useMediaQuery((theme) => theme.breakpoints.down("sm"));

  return (
    <List>
      {isSmall ? (
        <SimpleList
          primaryText={(record) => record.nameProduct}
          secondaryText={(record) => record.category}
          tertiaryText={(record) => record.purchasePrice}
          linkType="show"
        />
      ) : (
        <>
          <Datagrid size="medium" bulkActionButtons={false}>
            <ImageField source="picture.first.src" title="picture.first.title" label="Foto" />
            <TextField source="nameProduct" label="resources.products.fields.nameProduct" />
            <TextField source="category" label="resources.products.fields.category" />
            <NumberField source="purchasePrice" label="resources.products.fields.purchasePrice" />
            <NumberField
              source="amountAvailable"
              label="resources.products.fields.amountAvailable"
            />
            <BuyButton />
            <ShowButton />
          </Datagrid>
          <BuyDialog />
        </>
      )}
    </List>
  );
};

const AddImageButton = (props) => {
  const [addImageButtonStyle] = React.useState({
    color: "blue",
    visibility: "visible",
  });
  const { handleAddImage } = props;
  return (
    <Button onClick={handleAddImage} sx={addImageButtonStyle}>
      <>
        <AddCircleOutlineIcon />
        Add Image
      </>
    </Button>
  );
};

AddImageButton.propTypes = {
  handleAddImage: PropTypes.func.isRequired,
};
